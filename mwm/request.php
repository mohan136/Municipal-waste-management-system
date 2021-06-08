<!DOCTYPE html>
<head>
    <title>Request</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
</head>
<body>
    <div>
        
    </div>
    <form name="ReagentReqForm">
   <table cellspacing="0" cellpadding="5" border="0">
       <tr>
           <td colspan="2">Please use the form below to raise a request.
               All starred fields are required.</td>
       </tr>
<tr><td colspan="2"><br/></td></tr>
       <tr>
           <td colspan="2"><div id="errorTxt" style="display:none;color:red"></div></td>
       </tr>
       <tr>
           <td valign="top" width="100"><strong>Name:*</strong></td>
           <td valign="top"><input type="text" name="DisplayName" size="30"></td>
       </tr>
<tr><td colspan="2" style="line-height:.6em"><br/></td></tr>
       <tr>
           <td valign="top" width="100"><strong>Email:*</strong></td>
           <td valign="top"><input type="text" name="Email" size="30"></td>
       </tr>
<tr><td colspan="2" style="line-height:.6em"><br/></td></tr>
       <tr>
           <td valign="top" width="100"><strong>PhoneNo:*</strong></td>
           <td valign="top"><input type="text" name="PhoneNo" readonly="readonly" size="30"></td>
       </tr>
<tr><td colspan="2" style="line-height:.6em"><br/></td></tr>
       <tr>
           <td valign="top" width="100"><strong>Comments:</strong></td>
           <td valign="top"><textarea cols="53" rows="5" name="Comments"></textarea></td>
       </tr>
<tr><td colspan="2" style="line-height:.6em"><br/></td></tr>
        <tr>
           <td valign="top" colspan="2">
               <div align="center">
                   <input value='Submit' type='button' onclick='submitRequest()'>
           </td>
       </tr>
   </table>
</form>
</body>
