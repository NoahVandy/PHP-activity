<div align="center">
    <form action="onSubmitDivide" method = "POST">
        <input type = "hidden" name = "_token"
            value = "<?php echo csrf_token()?>"/>
        <h2>Divide View</h2>
        <table>
            <tr>
                <td>Operand #1: </td>
                <td><input type= "text" name= "operand1" maxlength="10"/>{{$errors->first('operand1')}}</td>
            </tr>
            <tr>
                <td>Operand #2: </td>
                <td><input type= "text" name= "operand2"  maxlength="10"/>{{$errors->first('operand2')}}</td>
            </tr>
            <tr>
                <td colspan = "2" align = "center">
                    <input type= "submit" value = "Calculate"/>
                </td>
            </tr>
        </table>
    </form>
</div>
    @if($errors->count() != 0)
    <h5>List of Errors</h5>
    @foreach($errors->all() as $message)
    {{ $message }} <br/>
    @endforeach
    @endif