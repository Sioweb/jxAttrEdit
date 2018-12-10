[{$smarty.block.parent}]
            <tr>
                <td class="edittext" width="120">
                    [{oxmultilang ident="FASTEDIT_ATTRIBS_DISPLAY"}]
                </td>
                <td class="edittext">
                    <input type="hidden" name="editval[oxattribute__jxattredit_fastedit]" value='0'>
                    <input class="edittext" type="checkbox" name="editval[oxattribute__jxattredit_fastedit]" value='1' [{if $edit->oxattribute__jxattredit_fastedit->value == 1}]checked[{/if}] [{$readonly}]>
                </td>
            </tr>