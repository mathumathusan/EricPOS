

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobPrescription</title>
    <style>
        :root {
            --heading: #091550;
            --text: #091550;
        }

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

        .container {
            margin: 0 auto;
            max-width: 800px;
            padding: 20px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 10px;
            font-family: Arial, sans-serif;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            color: var(--text);
        }

        * {
            margin: 0;
            padding: 0;
        }

        nav {
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .navLeft {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .navRight {
            color: var(--heading);
            font-size: 40px;
            font-weight: bold;
        }

        .navLeft img {
            height: 100px;
            width: 200px;
            object-fit: fill;
        }

        .sect1 {
            display: flex;
            padding: 10px;
            justify-content: space-between;
            align-items: center;
        }

        .sectLeft {
            display: flex;
            flex-direction: column;
        }

        .sectRight {}

        .sect2 {
            display: flex;
            flex-direction: column;
            padding: 10px;
        }

        .sect3 {
            display: flex;
            flex-direction: column;
            padding: 20px;
            position: relative;
        }

        .sect3 span {
            position: absolute;
            top: 0;
            left: 0;
            rotate: 270deg;
            margin-top: 180px;
            margin-left: -25px;
        }

        .head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
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
            padding: 20px;
            text-align: center;
        }

        thead {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        h2 {
            padding: 20px;
        }

        .sect4 {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .sectLeft div {
            display: flex;
            gap: 15px;
        }

        .sect5 {
            display: flex;
            padding: 20px;
        }

        input[type="checkbox"] {
            transform: scale(1.5);
            margin-right: 5px;
            color: var(--text);
            background-color: var(--text);
        }

        label {
            font-size: 16px;
        }

        .footer {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
            align-items: flex-end;
            margin-right: 20px;
        }

        .sect1,
        .sect2,
        .sect3,
        .sect4,
        .sect5 {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <div class="navLeft"><img src="/assets/images/Logo 01.png" alt="ericlogo"></div>
            <div class="navRight">ERIC GANESH OPTICIANS</div>
        </nav>
        <section class="sect1">
            <div class="sectLeft">
                <span>J64,566 Hospital Road</span><span>Jaffna</span><span>0212222486</span><span>0779933965</span>
            </div>
            <div class="sectRight"><span>Date:{{$jobPrescription->created_at->format('y/m/d')}}</span></div>
        </section>
        <section class="sect2">
            <span>Name:...........................{{$customer->cus_name}}......................................................................</span><span>Address:............................................{{$customer->address}}........................................................................................................</span><span>Age:.............{{ \Carbon\Carbon::parse($customer->dob)->age+1 }}.....................</span>
        </section>
        <section class="sect3">
            <div class="head">
                <h3>Right Eye</h3>
                <h3>Left Eye</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>SPH.</th>
                        <th>CYL.</th>
                        <th>AXIS.</th>
                        <th>SPH.</th>
                        <th>CYL.</th>
                        <th>AXIS.</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$jobPrescription->left_sph}}</td>
                        <td>{{$jobPrescription->left_cyl}}</td>
                        <td>{{$jobPrescription->left_axis}}</td>
                        <td>{{$jobPrescription->right_sph}}</td>
                        <td>{{$jobPrescription->right_cyl}}</td>
                        <td>{{$jobPrescription->right_axis}}</td> 
                    </tr>
                    <tr>
                        <td colspan="3" rowspan="3">Content</td>
                        <td colspan="3" rowspan="3">Content</td>
                    </tr>
                </tbody>
            </table>
        </section>
        <h2>Recommends</h2>
        <section class="sect4">
            <div class="sectLeft">
                <div>
                    <input type="checkbox"><label for="">Single Vision</label>
                </div>
                <div><input type="checkbox"><label for="">Reading only</label></div>
                <div>
                    <input type="checkbox"><label for="">Anti-Reflective Coating</label>
                </div>
                <div><input type="checkbox"><label for="">Sunglasses</label></div>
            </div>
            <div class="sectLeft">
                <div><input type="checkbox"><label for="">Bifocal</label></div>
                <div><input type="checkbox"><label for="">Progressive</label></div>
                <div><input type="checkbox"><label for="">Transitions</label></div>
                <div>
                    <input type="checkbox"><label for="">High-Index plastic</label>
                </div>
            </div>
        </section>
        <section class="sect5">
            <div class="remark">Remarks:</div>
            <div class="points">
                <span>..................................{{$jobOrder->remarks}}....................................................................</span>
            </div>
        </section>
        <footer class="footer">
            <span>.....{{$user->username}}.........</span><span>Signature</span>
        </footer>
    </div>
</body>
<button onclick="window.print()" class="print-button" style="width: 100px;height: 50px;margin: 20px auto;">Print</button>

</html>