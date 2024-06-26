<html>

<head>
    <style type='text/css'>
        body,
        html {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        th,
        td,
        p,
        div,
        b,
        h3 {
            margin: 0;
            padding: 0
        }

        /* html{margin:40px 50px} */
        .top-style {
            margin: 0;
            padding: 0;
            color: #1a8f43;
            height: 20px;
            background-color: #1a8f43;
        }

        hr {
            margin: 1px;
        }

        .table {
            display: table;
            width: 100%;
            border-collapse: collapse;
        }

        .table-row {
            display: table-row;
        }

        .table-cell {
            display: table-cell;
        }

        body {
            height: 100px;
            width: 100%;
            background-image: url({{ $imgBg }});
            background-size: cover;
            display: flex;
            justify-content: center;
            //modifications
            background-repeat: no-repeat;
            position: 'fixed';
            top: 0;
            left: 0;
        }

        .container {
            margin-top: 30px;
            margin-right: 10px;
        }

        .logo {
            width: 800px;
            color: #000;
            top: 300px;
            font-size: 28px;
            left: 5%;
            text-align: right;
        }

        .marquee {
            color: #F4D763;
            font-size: 60px;
            text-align: center;
        }

        .assignment {
            /* margin: 20px; */
            width: 780px;
            top: 250px;
            left: 100px;
            font-size: 20px;
            text-align: left;
        }

        .person {
            /* margin: 20px auto; */
            width: 700px;
            top: 280px;
            left: 100px;
            font-size: 20px;
            text-align: left;
        }

        .jabatan {
            width: 780px;
            font-size: 18px;
            /* margin-bottom: 5px;
                margin: 20px auto; */
            top: 350px;
            /* left: 100px; */
            text-align: center;
        }

        .reason {
            width: 780px;
            font-size: 18px;
            top: 374px;
            /* left: 100px; */
            text-align: center;
        }

        .study {
            width: 780px;
            color: #DDB34D;
            font-size: 18px;
            top: 394px;
            /* left: 100px; */
            text-align: center;
        }

        .date {
            width: 780px;
            font-size: 18px;
            top: 415px;
            /* left: 100px; */
            text-align: center;
        }

        .qr-code {
            width: 780px;
            top: 430px;
            text-align: left;
            left: 23px;
        }

        .lambang {
            width: 800px;
            top: 3px;
            left: 18%;
            text-align: right;
        }

        .logo-bts {
            width: 800px;
            top: 3px;
            left: 27%;
            text-align: right;
        }

        .bg {
            max-width: 100%;

        }

        .identitas {
            margin-top: 10px;
            margin-left: 200px;
        }

        .qrcode-row {
            height: 70px;
            width: 100%;
            position: fixed;
            bottom: 0;
            margin-bottom: 100px;
            margin-left: 50px;
        }

        .signature {
            margin-top: 60px;
            margin-left: 280px;
            position: absolute;
            height: 70px;
            width: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="table">
            <div class="table-row">
                <div class="table-cell header-right" style="text-align: right;">
                    <img src="{{ $imgLambang }}" alt="" width="100" height="100">
                    <img src="{{ $imgLogoBts }}" alt="" width="150" height="100">
                </div>
            </div>
            <div class="table-row">
                <div class="table-cell" style="text-align: center;">
                    <div class="marquee">
                        SERTIFIKAT</br> PENGHARGAAN
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="table">
            <div class="table-row">
                <div class="table-cell" style="text-align: center;">
                    ID Sertifikat : {{ $peserta_bts->uuid }}
                </div>
            </div>
        </div>
    </div>
    <section class="identitas">
        <div class="table">
            <div class="table-row">
                <div class="table-cell">
                    <table>
                        <tr>
                            <td>
                                <h2 style="margin: 0;">NAMA</h2>
                            </td>
                            <td>
                                <h2 style="margin: 0;">&nbsp;&nbsp;:&nbsp;&nbsp;</h2>
                            </td>
                            <td>
                                <h2 style="margin: 0;">{{ $peserta_bts->nama }}</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h2 style="margin: 0;">INSTANSI</h2>
                            </td>
                            <td>
                                <h2 style="margin: 0;">&nbsp;&nbsp;:&nbsp;&nbsp;</h2>
                            </td>
                            <td>
                                <h2 style="margin: 0;">{{ $peserta_bts->nama_instansi }}</h2>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="table">
            <div class="table-row">
                <div class="table-cell" style="text-align: center;">
                    <p style="font-size: 21px;">sebagai <strong>`{{ strtoupper($role) }}`</strong></p>
                </div>
            </div>
            <div class="table-row">
                <div class="table-cell" style="text-align: center;">
                    <p style="font-size: 21px;">dalam Bimbingan Teknis dan Sosialisasi</p>
                </div>
            </div>
            <div class="table-row">
                <div class="table-cell" style="text-align: center;">
                    <h3 style="color: #DDB34D;">`{{ $peserta_bts->jadwal_bts->judul }}`</h3>
                </div>
            </div>
            <div class="table-row">
                <div class="table-cell" style="text-align: center;">
                    <p style="font-size: 21px;">Tanggal {{ $tanggal }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="qrcode-row">
        <div class="table">
            <div class="table-row">
                <div class="table-cell" style="width: 40%">
                    <img src="data:image/png;base64, {!! $qrcode !!}">
                </div>
            </div>
        </div>
    </div>
    <!--
        <div class="signature">
            <div class="table">
                <div class="table-row">
                    <div class="table-cell">
                        <img src="{{ $imgSignature }}" width="250" height="100">
                    </div>
                </div>
            </div>
        </div>
        -->
</body>

</html>
