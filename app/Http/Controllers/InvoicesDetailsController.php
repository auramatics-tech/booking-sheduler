<?php

namespace App\Http\Controllers;

use App\Inovice;
use App\InvoiceDetail;
use App\InvoiceAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InvoicesDetailsController extends Controller
{
    public function InvoicesDetails($id)
    {
      $invoices =  Inovice::where('id',$id)->first();
      $details  = InvoiceDetail::where('inovice_id',$id)->get();
      $attachments  = InvoiceAttachment::where('inovice_id',$id)->get();

      return view('invoices.invoices_details',compact('invoices','details','attachments'));

      // return view('invoices.invoices_details' , compact('invoices'));
    }


    public function destroy(Request $request)
    {
        $invoices = invoice_attachments::findOrFail($request->id_file);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }

     public function get_file($invoice_number,$file_name)

    {
        $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
        return response()->download( $contents);
    }



    public function open_file($invoice_number,$file_name)

    {
        $files = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
        return response()->file($files);
    }
}
