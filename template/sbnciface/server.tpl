                {if $errorSet == 1}
                <div class="{$errorType}">
                    {$errorMessage}
                </div>
                {/if}
                <form action="" method="POST">
                    <table id="tbl" align="center" width="400">
                        <tr><td width="40%">{$serverText}:</td><td width="60%"><input type="text" name="{$serverName}" size="33" value="{$serverValue}" /></td></tr>
                        <tr><td width="40%">{$portText}:</td><td width="60%"><input type="text" name="{$portName}" size="33" value="{$portValue}" /></td></tr>
                        <tr><td width="40%">{$passwordText}:</td><td width="60%"><input type="text" name="{$passwordName}" size="33" value="{$passwordValue}" /></td></tr>
                        <tr><td width="40%">{$vhostText}:</td><td width="60%"><select name="{$vhostName}" style="width:225px;" >{loop $vhostValue}{if $_parent.vhostInUse == $0}<option value="{$0}" selected>{$3}</option>{else}<option value="{$0}">{$3}</option>{/if}{/loop}</select></td></tr>
                        <tr><td colspan="2" align="center"><input type="submit" value="{$submitValue}" name="do" /> <input type="submit" value="{$jumpValue}" name="jump" /></td></tr>
                    </table>
                </form>