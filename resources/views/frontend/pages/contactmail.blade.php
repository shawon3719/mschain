{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: Shawon--}}
{{--*/--}}
<!DOCTYPE html>
<html>

<head>
    <title></title>
    <style type="text/css">
        body,
        table,
        th,
        td {
            font-family: Arial, Helvetica, sans-serif !important;
            font-size: 11px;
            /*border:1px solid black;*/
        }
    </style>
</head>

<body>
    <table style="border-collapse:collapse; max-width:1200px; width:100%">
        <tbody>
            <tr>
                <td style="vertical-align:top">
                    <!-- START CONTENT -->
                    <table style="border-collapse:collapse; width:100%">
                        <tbody>
                            <tr>
                                <td style="text-align:center">
                                    <h1>Contact Form</h1>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <hr />
                    <table style="border-collapse:collapse; width:100%">
                        <tbody>
                            <tr>
                                <td style="vertical-align:top; width:30%">
                                    <table style="border-collapse:collapse; width:100%">
                                        <tbody>
                                            <tr>
                                                <td style="text-align:left; vertical-align:top; width:40%">
                                                    <strong>Email:</strong></td>
                                                <td style="text-align:left; vertical-align:top; width:60%">
                                                    {{$data['email']}}</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:left; vertical-align:top; width:40%">
                                                    <strong>Phone:</strong></td>
                                                <td style="text-align:left; vertical-align:top; width:60%">
                                                    {{$data['phone']}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <hr />
                    <table style="border-collapse:collapse; width:100%">
                        <tbody>
                            <tr>
                                <!-- START LEFT COLUMN-->
                                <td style="vertical-align:top; width:50%">
                                    <table style="border-collapse:collapse; width:100%">
                                        <thead>
                                            <tr>
                                                <td colspan="2"
                                                    style="background-color:rgb(204, 204, 204); text-align:center">
                                                    <strong>Contact Details</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="text-align:left; vertical-align:top"><strong>Name:</strong>
                                                </td>
                                                <td style="text-align:left; vertical-align:top">{{$data['name']}}</td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:left; vertical-align:top">
                                                    <strong>Message:</strong></td>
                                                <td style="text-align:left; vertical-align:top">{{$data['message']}}
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                                <!-- END LEFT COLUMN -->
                                <!-- START CENTER COLUMN -->
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
