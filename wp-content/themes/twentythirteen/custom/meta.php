<div class="my_meta_control">
        <label style="">Review</label>
        <select name="review_specs[link]">
            <option value ="0">Select Star</option>
            <option value ="1"<?php if (!empty($review_specs_values['link']) && $review_specs_values['link']==1) echo "selected"?>> One</option>
            <option value ="2"<?php if (!empty($review_specs_values['link']) && $review_specs_values['link']==2) echo 'selected=selected'?>> Two</option>
            <option value ="3"<?php if (!empty($review_specs_values['link']) && $review_specs_values['link']==3) echo "selected"?>> Three</option>
            <option value ="4"<?php if (!empty($review_specs_values['link']) && $review_specs_values['link']==4) echo "selected"?>>Four</option>
            <option value ="5"<?php if (!empty($review_specs_values['link']) && $review_specs_values['link']==5) echo "selected"?>>Five</option>
        </select><div style="clear:both;"></div>

        <h3 class="heading">Spec Comparisons</h3>
        <table>
            <tr><th width="36%"><label>Watts</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['watt'])) echo $review_specs_values['watt']; ?>" name="review_specs[watt]"/></td></tr>
            <tr><th><label>HP</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['hp'])) echo $review_specs_values['hp']; ?>" name="review_specs[hp]"/></td></tr>
            <tr><th><label>Gforce</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['gforce'])) echo $review_specs_values['gforce']; ?>" name="review_specs[gforce]"/></td></tr>
            <tr><th><label>Amplitude</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['amplitude'])) echo $review_specs_values['amplitude']; ?>" name="review_specs[amplitude]"/></td></tr>
            <tr><th><label>Durability</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['durability'])) echo $review_specs_values['durability']; ?>" name="review_specs[durability]"/></td></tr>
        </table>
        
        <h3 class="heading">Health Performance Comparison Ratings</h3>
        <table>
            <tr><th width="14%"><label>Bone Health</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['bone_health'])) echo $review_specs_values['bone_health']; ?>" name="review_specs[bone_health]"/></td></tr>
            <tr><th><label>Circulation</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['circulation'])) echo $review_specs_values['circulation']; ?>" name="review_specs[circulation]"/></td></tr>
            <tr><th><label>Lymphatic</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['lymphatic'])) echo $review_specs_values['lymphatic']; ?>" name="review_specs[lymphatic]"/></td></tr>
            <tr><th><label>Fitness</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['cr_fitness'])) echo $review_specs_values['cr_fitness']; ?>" name="review_specs[cr_fitness]"/></td></tr>
            <tr><th><label>Detoxification</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['cr_detoxification'])) echo $review_specs_values['detoxification']; ?>" name="review_specs[cr_detoxification]"/></td></tr>
             <tr><th><label>Weight Loss</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['weightloss'])) echo $review_specs_values['weightloss']; ?>" name="review_specs[weightloss]"/></td></tr>
             <tr><th><label>Pain Relief Consumer Review</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['pain_relief_consumer_review'])) echo $review_specs_values['pain_relief_consumer_review']; ?>" name="review_specs[pain_relief_consumer_review]"/></td></tr>
             
        </table>
        

        <h3 class="heading">Key Specs</h3>
        <table>
            <tr><th width="20%"><label>Fitness</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['fitness'])) echo $review_specs_values['fitness']; ?>" name="review_specs[fitness]"/></td></tr>
            <tr><th><label>Bone</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['bone'])) echo $review_specs_values['bone']; ?>" name="review_specs[bone]"/></td></tr>
            <tr><th><label>Detoxification</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['detoxification'])) echo $review_specs_values['detoxification']; ?>" name="review_specs[detoxification]"/></td></tr>
            <tr><th><label>Lymph Drainage</label></th><td><input type="text" style="width:200px;" value="<?php if(!empty($review_specs_values['lymph_drainage'])) echo $review_specs_values['bone']; ?>" name="review_specs[lymph_drainage]"/></td></tr>
        </table>
        <h3 class="heading">Facts</h3>
        <?php $fact = 1; ?>
        <table id ="facts">
            <?php
                if (isset($review_specs_values['fact'])) {   
                ?>
                <?php 
                    foreach ($review_specs_values['fact'] as $values) {
                      echo "<tbody id =fact$fact>";
                      echo "<tr><th width='15%''><label>Title $fact</label></th>";
                      echo "<td><input name='review_specs[fact][$fact][title]' type ='text' name= 'text' value='$values[title]' style='width:200px;'/></td></tr>";
                      echo '<tr><th width="15%"><label>Description '.$fact.'</label></th>';
                      echo "<td><textarea rows='3' style='width:39%' name='review_specs[fact][$fact][desc]'>";
                      echo  $values["desc"];
                      echo  "</textarea></td>";
                      echo '<td class="left"><a onclick="jQuery(\'#fact' .$fact. '\').remove();" class="button">Remove</a></td></tr>';    
                      echo '</tbody>';
                      $fact++;
                    }
                }
                 ?>
            <tfoot>
                <tr>
                    <td colspan="2" ></td>
                    <td class="left"><a onclick="addModule();" class="button"><?php echo "Add Fact"; ?></a></td>
                </tr>
                <!-- <tr><th></th><td></td></tr> -->
            </tfoot>
        </table>
        <div style="clear:both;"></div>
            
</div>
<script type="text/javascript">
var fact ="<?php echo $fact; ?>";

function addModule(){
    html = '<tbody id = "fact'+fact +'">';
    html += '<tr>';
    html +='<th width="15%"><label>Title '+fact+'</label></th>';
    html += '<td><input name="review_specs[fact]['+fact+'][title]" type ="text" style ="width:200px;"/></td></tr>';
    html +='<tr><th width="15%"><label>Description '+fact+'</label></th>';
    html +='<td><textarea style ="width:39%;" name="review_specs[fact]['+fact+'][desc]"></textarea></td>';
    html +='<td class="left"><a onclick="jQuery(\'#fact' +fact+ '\').remove();" class="button"><?php echo "remove"; ?></a></td></tr>';
    html +='</tbody></br>';
    fact++;
    jQuery('tfoot').before(html);
}
</script>