<!DOCTYPE html>

<head>
    <title>Request</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <style>
        body {
            background-color: #ABEBC6;
        }

        .container {
            margin-left: 200px;
            margin-top: 10px;
            background-color: rgb(240, 238, 240);
            border-radius: 50px;
            padding: 50px;
            width: 60%;
            box-shadow: -5px -5px 10px 5px rgba(211, 185, 185, 0.653), 5px 5px 10px 5px rgba(173, 173, 196, 0.653);
        }

        .sign {
            text-align: center;
            background-color: rgb(54, 91, 224) !important;
            color: white;
            display: inline-block;
            width: 80px;
            height: 40px;
            font-weight: 600;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            padding: .375rem .75rem;
            font-size: 12px;
            line-height: 1.5;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
    </style>
</head>

<body>
    <section>
        <div class="heading" style="display: flex;justify-content: center; width: 76%; padding: 16px;">
          <div class="breadcrums">
            <div class="arrow" style="cursor: pointer; font-weight: 600;color: gray;"><- <span>Go to home</span></div>
          </div>
          <p class="" style="margin-left: 200px;font-size: 16px;font-weight: 600;" >R E Q U E S T  P A G E</p>
        </div>
      </section>
    <div>

    </div>
    <form class=container name="ReagentReqForm">
        <table cellspacing="0" cellpadding="5" border="0">
            <tr>
                <td colspan="2">Please use the form below to raise a request.
                    All starred fields are required.</td>
            </tr>
            <tr>
                <td colspan="2"><br /></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="errorTxt" style="display:none;color:red"></div>
                </td>
            </tr>
            <tr>
                <td valign="top" width="100"><strong>Name:*</strong></td>
                <td valign="top"><input type="text" name="DisplayName" size="30"></td>
            </tr>
            <tr>
                <td colspan="2" style="line-height:.6em"><br /></td>
            </tr>
            <tr>
                <td valign="top" width="100"><strong>Email:*</strong></td>
                <td valign="top"><input type="text" name="Email" size="30"></td>
            </tr>
            <tr>
                <td colspan="2" style="line-height:.6em"><br /></td>
            </tr>
            <tr>
                <td valign="top" width="100"><strong>PhoneNo:*</strong></td>
                <td valign="top"><input type="number" name="PhoneNo" size="30"></td>
            </tr>
            <tr>
                <td colspan="2" style="line-height:.6em"><br /></td>
            </tr>
            <tr>
                <td valign="top" width="100"><strong>Comments:*</strong></td>
                <td valign="top"><textarea cols="53" rows="5" name="Comments"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="line-height:.6em"><br /></td>
            </tr>
            <tr>
                <td valign="top" colspan="2">
                    <div align="center">
                        <button type="submit" class="sign" onclick='submitRequest()'>submit</button>
                        <!-- <input value='Submit' type='button' onclick='submitRequest()'> -->
                </td>
            </tr>
        </table>
    </form>
</body>
