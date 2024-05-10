<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>eric invoice2</title>
  <style>
    @media print {
      body>*:not(.container) {
        display: none;
      }

      .container {
        display: block !important;
      }


      .print-button {
        display: none;
      }
    }

    :root {
      --text-color: #8d4563;
    }

    .container {
      margin: 0 auto;
      max-width: 800px;
      padding: 20px;


      border-radius: 10px;
      font-family: Arial, sans-serif;

      font-family: Arial, sans-serif;
      color: var(--text-color);
    }

    nav {
      padding-left: 10px;
      padding-right: 10px;
      padding-bottom: 10px;
      border: 1px solid black;
      border-radius: 15px;
    }

    .navhead {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .img1 {
      height: 100px;
      width: 200px;
      object-fit: fill;
    }

    .img2 {
      height: 180px;
      width: 200px;
      object-fit: fill;
    }

    .navbody {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .navbodyleft {
      display: flex;
      flex-direction: column;
    }

    .navbodyright {
      display: flex;
      flex-direction: column;
    }

    .date {
      display: flex;
      align-items: center;
    }

    .date1 {
      display: flex;
    }

    .date1 div {
      border: 1px solid black;
      padding: 8px;
    }

    .sect2 {
      display: flex;
      flex-direction: column;
      gap: 10px;
      padding: 10px;
    }

    .sect2 div {
      display: flex;
      justify-content: space-between;
    }

    .input {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 10px;
    }

    .input label {
      margin-bottom: 5px;
    }

    .input input {
      width: 100%;
      padding-top: 20px;
      border-radius: 10px;
    }

    .sect3 {
      display: flex;
      flex-direction: column;
      padding: 15px;
      position: relative;
    }

    .sect3 span {
      position: absolute;
      top: 0;
      left: 0;
      rotate: 270deg;
      margin-top: 215px;
      margin-left: -25px;
    }

    .span {
      padding-left: -50px;
    }

    .head {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border-radius: 25px;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }

    th,
    td {
      padding: 10px;
      text-align: center;
    }

    thead {
      background-color: #f2f2f2;
    }

    tbody tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .sect4 {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .sect4 div {
      display: flex;
      justify-content: space-between;
    }

    .table {
      width: 35%;
    }

    .table .thead tr th,
    .table .tbody tr td {
      padding: 5px;
    }

    .remarks {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .job {
      margin-left: 520px;
    }
  </style>
</head>

<body>
  <div class="container">
    <nav>
      <div class="navhead">
        <img class="img1" src="/assets/images/Logo.png" alt="ericlogo" />
        <h1>ERIC GANESH OPTICIANS</h1>
        <img src="/assets/images/glass1.png" alt="ericglass" class="img2" />
      </div>
      <div class="navbody">
        <div class="navbodyleft">
          <span>564,566 Hospital Road,</span><span>Jaffna</span><span>Tele/Fax:0212222486</span>
        </div>
        <div class="navbodyright">
          <span>564,566ஆஸ்பத்திரி வீதி,</span><span> யாழ்ப்பாணம்.</span><span class="date">Date:
            <div class="date1">
              {{$sale->sales_date}}
            </div>
          </span>
        </div>
      </div>
    </nav>
    <section class="sect2">
      <span>date:</span>
      <span>Name:.........................{{$customer->cus_name}}.................................................</span><span>Address:...............{{$customer->address}}..................................</span>
      <div>
        <span>Age:..........{{ \Carbon\Carbon::parse($customer->dob)->age+1 }}........................</span><span>Contact:..............{{$customer->mobile}}....................</span>
      </div>
      <div>
        <div class="input">
          <label for="">Due Date</label><input type="text" value="{{$job?$job->due_date:''}}" style="font-size: 12px; display: flex; justify-content: center; align-items: center;text-align:center;display: flex;padding-bottom:10px;" />
        </div>
        <div class="input">
          <label for="">Job No</label><input type="text" value="{{$job?$job->job_no:''}}" style="font-size: 12px;  text-align:center;padding-bottom:10px;" />
        </div>
      </div>
    </section>
    <section class="sect3">
      <div class="head">
        <h3>Right Eye</h3>
        <h3>Left Eye</h3>
      </div>
      <table>
        <thead>
          <tr>
            <th>SPH</th>
            <th>CYL.</th>
            <th>AXIS.</th>
            <th>SPH.</th>
            <th>CYL.</th>
            <th>AXIS.</th>
          </tr>
        </thead>
        <tbody>
        @if($prescription)
    <td>{{$prescription->right_sph}}</td>
    <td>{{$prescription->right_cyl}}</td>
    <td>{{$prescription->right_axis}}</td>
    <td>{{$prescription->left_sph}}</td>
    <td>{{$prescription->left_sph}}</td>
    <td>{{$prescription->left_sph}}</td>
@else
    <td colspan="6">Prescription data not available</td>
@endif
          <tr>
            <td colspan="3" rowspan="3">Content</td>
            <td colspan="3" rowspan="3">Content</td>
          </tr>
        </tbody>
      </table>
    </section>
    <section class="sect4">
    <span>Lenses:........{{$frame ? 'Lenses: .....' . $frame->lens_type . '....' : 'No JobFrame instance found.'}}.................................................</span><span>Frame Type:..........{{$frame ? $frame->type : 'N/A'}}......................<span>P.D:..................................................................................................</span></span>
      <div>
        <span class="remarks">tested by:......{{$user->name}}................<span>Remarks:{{$job?$job->remarks:''}}</span></span>
        <table class="table">
          <thead class="thead">
            <tr>
              <th colspan="2">Price List</th>
            </tr>
          </thead>
          <tbody class="tbody">
            <tr>
              <td>Frame</td>
              <td>{{$job?$job->frame_amount:''}}</td>
            </tr>
            <tr>
              <td>Lenses</td>
              <td>{{$job?$job->lens_amount:''}}</td>
            </tr>
            <tr>
              <td>discount</td>
              <td>{{$job?$job->discount_amount:''}}</td>
            </tr>
            <tr>
              <td>Total</td>
              <td>{{$job?$job->frame_amount+$job->lens_amount-$job->discount_amount:""}}</td>
              <td>{{$sale->total}}</td>
            </tr>
            <tr>
              <td>Advance</td>
              <td>{{$job?$job->paid_amount:''}}</td>
            </tr>
            <tr>
              <td>Balance</td>
              <td>{{$job?$job->balance_amount:''}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      <span class="job">Job Taken By:...{{$user->name}}</span>
    </section>
    <button onclick="window.print()" class="print-button" style="width: 100px;height: 50px;margin: 20px auto;">Print</button>
  </div>
</body>

</html>