<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div>
    <p>Name  : {{isset($student_email->student_name) ? $student_email->student_name : ''}}</p>
    <p>Email  : {{isset($student_email->student_email) ? $student_email->student_email : ''}}</p>
    <p> Teacher Name  : {{isset($student_email->teacher_name) ? $student_email->teacher_name : ''}}</p>
    <p>Slot Date : {{isset($student_email->start_date) ?  date('d-m-Y', strtotime($student_email->start_date)) : ''}}</p>
    <p> Slot Time : {{isset($student_email->slot_time) ? date('h:i a ', strtotime($student_email->slot_time)): ''}}</p>
    <hr>
    <h2>Thank you for Booking. </h2>
    </div>
</body>
</html>