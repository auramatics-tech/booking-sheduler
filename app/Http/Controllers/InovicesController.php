<?php

namespace App\Http\Controllers;

use App\Exports\InoviceExport;
use App\Models\Inovice;
use App\Models\InvoiceAttachment;
use App\Models\InvoiceDetail;
use App\Notifications\AddInvoice;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Excel;
class InovicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $inovices = Inovice::get();
       if($request->Value_Status == 1 ){
        $inovices= Inovice::where('Value_Status' , 1)->get();
       }
       if($request->Value_Status == 2 ){
        $inovices= Inovice::where('Value_Status' , 2)->get();
       }
       if($request->Value_Status == 3 ){
        $inovices= Inovice::where('Value_Status' , 3)->get();
       }
        // Value_Status
        return view('invoices.invoices' ,compact('inovices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = Section::get();
        return view('invoices.add_invoice' , compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Inovice::create([
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'Status' => 'غير مدفوعة',
            'Value_Status' => 2,
            'note' => $request->note,
        ]);

             $invoice_id = Inovice::latest()->first()->id;
             InvoiceDetail::create([
            'inovice_id' => $invoice_id,
            'invoice_number' => $request->invoice_number,
            'product' => $request->product,
            'Section' => $request->Section,
            'Status' => 'غير مدفوعة',
            'Value_Status' => 2,
            'note' => $request->note,
            'user' => (Auth::user()->name),
        ]);

        if ($request->hasFile('pic')){

            $invoice_id = Inovice::latest()->first()->id;
            $image = $request->file('pic');
            $file_name=$image->getClientOriginalName();
            $invoice_number = $request->invoice_number;

            $attachments = new InvoiceAttachment();
            $attachments->file_name = $file_name;
            $attachments->invoice_number = $invoice_number;
            $attachments->Created_by = Auth::user()->name;
            $attachments->inovice_id = $invoice_id;
            $attachments->save();

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/'. $invoice_number), $imageName);

        }


        $user = User::first();
            //$user->notify(new AddInvoice($invoice_id));
            
         Notification::send($user, new AddInvoice($invoice_id));

          $user_not = User::get();
         $invoice_idd = Inovice::latest()->first();
         Notification::send($user_not, new \App\Notifications\AddNewInonice($invoice_idd));
        //  $user_not->notify(new \App\Notifications\AddNewInonice($invoice_idd));


        session()->flash('Add', 'تم اضافة الفاتورة بنجاح');
        // return back();
        return redirect('/invoices');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\inovices  $inovices
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoices = Inovice::where('id', $id)->first();
        return view('invoices.status_update', compact('invoices'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\inovices  $inovices
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $invoices = Inovice::where('id',$id)->first();
       $sections = Section::all();
       return view('invoices.edit_invoice',compact('sections','invoices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $invoices = Inovice::findOrFail($request->invoice_id);
         $invoices->update([ 
            'invoice_number' => $request->invoice_number,
            'invoice_Date' => $request->invoice_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'note' => $request->note,
            ]);

            session()->flash('edit', 'تم تعديل الفاتورة بنجاح');
            return redirect('/invoices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\inovices  $inovices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $id = $request->invoice_id;
         $invoices = Inovice::where('id', $id)->first();
         $Details = InvoiceAttachment::where('inovice_id', $id)->first();

         
      
         $id_page =$request->id_page;
         if (!$id_page==2) {

            if (!empty($Details->invoice_number)) {
    
                Storage::disk('public_uploads')->deleteDirectory($Details->invoice_number);
            }
    
            $invoices->forceDelete();
            session()->flash('delete_invoice');
            return redirect('/invoices');
             
            }            
            else {                
                $invoices->delete();
                session()->flash('archive_invoice');
                return redirect('/Archive');
            }
       
    }


    public function getproducts($id) {
        $states = DB::table("products")->where("section_id",$id)->pluck("Product_name","id");
        return json_encode($states);
    }

    public function Status_Update($id, Request $request)
    {
        $invoices = Inovice::findOrFail($id);
        
        // dd($request->invoice_id);
        if ($request->Status === 'مدفوعة') {

            $invoices->update([
                'Value_Status' => 1,
                'Status' => $request->Status,
                'Payment_Date' => $request->Payment_Date,
            ]);

            InvoiceDetail::create([
                'inovice_id' => $request->invoice_id,
                'invoice_number' => $request->invoice_number,
                'product' => $request->product,
                'Section' => $request->Section,
                'Status' => $request->Status,
                'Value_Status' => 1,
                'note' => $request->note,
                'Payment_Date' => $request->Payment_Date,
                'user' => (Auth::user()->name),
            ]);
        } 
        
        else {
            $invoices->update([
                'Value_Status' => 3,
                'Status' => $request->Status,
                'Payment_Date' => $request->Payment_Date,
            ]);
            InvoiceDetail::create([
                'inovice_id' => $request->invoice_id,
                'invoice_number' => $request->invoice_number,
                'product' => $request->product,
                'Section' => $request->Section,
                'Status' => $request->Status,
                'Value_Status' => 3,
                'note' => $request->note,
                'Payment_Date' => $request->Payment_Date,
                'user' => (Auth::user()->name),
            ]);
        }
        session()->flash('Status_Update');
        return redirect('/invoices');

    }
    public function Print_invoice($id)
    {
        $invoices = Inovice::where('id', $id)->first();
        return view('invoices.Print_invoice',compact('invoices'));
    }

    public function export() 
    {
        return Excel::download(new InoviceExport, 'Inovice.xlsx');
    }

    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();

        return redirect()->back();
    }
}
