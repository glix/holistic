<div class="my_meta_control">
    <table class="link-padding">
        <tr>
            <th>
                 <label style="">Rating Stars</label>
            </th>
             <td>
                <select name="review_specs[link]">
                    <option value ="0">Select Star</option>
                    <option value ="1"<?php if (!empty($review_specs_values['link']) && $review_specs_values['link']==1) echo "selected"?>> One</option>
                    <option value ="2"<?php if (!empty($review_specs_values['link']) && $review_specs_values['link']==2) echo 'selected=selected'?>> Two</option>
                    <option value ="3"<?php if (!empty($review_specs_values['link']) && $review_specs_values['link']==3) echo "selected"?>> Three</option>
                    <option value ="4"<?php if (!empty($review_specs_values['link']) && $review_specs_values['link']==4) echo "selected"?>>Four</option>
                    <option value ="5"<?php if (!empty($review_specs_values['link']) && $review_specs_values['link']==5) echo "selected"?>>Five</option>
                </select>
        <!-- <div style="clear:both;"></div> -->
            </td>
        </tr>
    </table>
    <table class="bottom-padding">
        <tr>
             <td><label class="featured">Featured</label><input type="checkbox" name="review_specs[featured]" value="1" <?php if ($review_specs_values['featured']==1) echo "checked"; ?>></td>

        </tr>
    </table>
    <h3 class="heading">Spec Comparisons</h3>
    <table>
        <tr><th><label class="the-title">Watts</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['watt'])) echo $review_specs_values['watt']; ?>" name="review_specs[watt]"/></td></tr>
        <tr><th><label class="the-title">HP</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['hp'])) echo $review_specs_values['hp']; ?>" name="review_specs[hp]"/></td></tr>
        <tr><th><label class="the-title">Gforce</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['gforce'])) echo $review_specs_values['gforce']; ?>" name="review_specs[gforce]"/></td></tr>
        <tr><th><label class="the-title">Amplitude</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['amplitude'])) echo $review_specs_values['amplitude']; ?>" name="review_specs[amplitude]"/></td></tr>
        <tr><th><label class="the-title">Durability</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['durability'])) echo $review_specs_values['durability']; ?>" name="review_specs[durability]"/></td></tr>
    </table>
    
    <h3 class="heading">Health Performance Comparison Ratings</h3>
    <table>
        <tr><th width="14%"><label class="the-title">Bone Health</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['bone_health'])) echo $review_specs_values['bone_health']; ?>" name="review_specs[bone_health]"/></td></tr>
        <tr><th><label class="the-title">Circulation</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['circulation'])) echo $review_specs_values['circulation']; ?>" name="review_specs[circulation]"/></td></tr>
        <tr><th><label class="the-title">Lymphatic</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['lymphatic'])) echo $review_specs_values['lymphatic']; ?>" name="review_specs[lymphatic]"/></td></tr>
        <tr><th><label class="the-title">Fitness</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['cr_fitness'])) echo $review_specs_values['cr_fitness']; ?>" name="review_specs[cr_fitness]"/></td></tr>
        <tr><th><label class="the-title">Detoxification</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['cr_detoxification'])) echo $review_specs_values['detoxification']; ?>" name="review_specs[cr_detoxification]"/></td></tr>
         <tr><th><label class="the-title">Weight Loss</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['weightloss'])) echo $review_specs_values['weightloss']; ?>" name="review_specs[weightloss]"/></td></tr>
         <tr><th><label class="the-title">Pain Relief Consumer Review</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['pain_relief_consumer_review'])) echo $review_specs_values['pain_relief_consumer_review']; ?>" name="review_specs[pain_relief_consumer_review]"/></td></tr>
         
    </table>
    

    <h3 class="heading">Key Specs</h3>
    <table>
        <tr><th width="20%"><label class="the-title">Fitness</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['fitness'])) echo $review_specs_values['fitness']; ?>" name="review_specs[fitness]"/></td></tr>
        <tr><th><label class="the-title">Bone</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['bone'])) echo $review_specs_values['bone']; ?>" name="review_specs[bone]"/></td></tr>
        <tr><th><label class="the-title">Detoxification</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['detoxification'])) echo $review_specs_values['detoxification']; ?>" name="review_specs[detoxification]"/></td></tr>
        <tr><th><label class="the-title">Lymph Drainage</label></th><td><input type="text" value="<?php if(!empty($review_specs_values['lymph_drainage'])) echo $review_specs_values['bone']; ?>" name="review_specs[lymph_drainage]"/></td></tr>
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
                      echo "<tr><th width='15%''><label class='the-title'>Title $fact</label></th>";
                      echo "<td><input name='review_specs[fact][$fact][title]' type ='text' name= 'text' value='$values[title]'/></td></tr>";
                      echo '<tr><th width="15%"><label class="the-title">Description '.$fact.'</label></th>';
                      echo "<td><textarea rows='3' name='review_specs[fact][$fact][desc]'>";
                      echo  $values["desc"];
                      echo  "</textarea></td>";
                      echo '<td class="left"><a onclick="jQuery(\'#fact' .$fact. '\').remove();" class="button">Remove</a></td></tr>';    
                      echo '</tbody>';
                      $fact++;
                    }
                }
                 ?>
            <tfoot class="add_fact">
                <tr>
                    <td colspan="2" ></td>
                    <td class="left"><a onclick="addModule();" class="button"><?php echo "Add Fact"; ?></a></td>
                </tr>
                <!-- <tr><th></th><td></td></tr> -->
            </tfoot>
        </table>
        <div style="clear:both;"></div>
         <h3 class="heading">Videos</h3>
        <?php $video = 1; ?>
        <table id ="videos">
            <?php
                if (isset($review_specs_values['video'])) {   
                ?>
                <?php 
                    foreach ($review_specs_values['video'] as $values) {
                      echo "<tbody id =video$video>";
                      echo "<tr><th width='15%''><label class='the-url'>URL $video</label></th>";
                      echo "<td><input name='review_specs[video][$video][url]' type ='text' name= 'text' value='$values[url]'/></td>";
                      echo '<td class="left"><a onclick="jQuery(\'#video' .$video. '\').remove();" class="button">Remove</a></td></tr>';    
                      echo '</tbody>';
                      $video++;
                    }
                }
                 ?>
            <tfoot class="add_videos">
                <tr>
                    <td colspan="2" ></td>
                    <td class="left"><a onclick="addvideoModule();" class="button"><?php echo "Add video"; ?></a></td>
                </tr>
            </tfoot>
        </table>
        <div style="clear:both;"></div>
            
</div>
<script type="text/javascript">
var fact ="<?php echo $fact; ?>";
var video = "<?php echo $video; ?>"

function addModule(){
    html = '<tbody id = "fact'+fact +'">';
    html += '<tr>';
    html +='<th width="15%"><label class="the-title">Title '+fact+'</label></th>';
    html += '<td><input name="review_specs[fact]['+fact+'][title]" type ="text" /></td></tr>';
    html +='<tr><th width="15%"><label class="the-title">Description '+fact+'</label></th>';
    html +='<td><textarea rows="3" name="review_specs[fact]['+fact+'][desc]"></textarea></td>';
    html +='<td class="left"><a onclick="jQuery(\'#fact' +fact+ '\').remove();" class="button"><?php echo "remove"; ?></a></td></tr>';
    html +='</tbody></br>';
    fact++;
    jQuery('.add_fact').before(html);
}

function addvideoModule(){
    html = '<tbody id = "video'+video +'">';
    html += '<tr>';
    html +='<th width="15%"><label class="the-url">URL '+video+'</label></th>';
    html += '<td><input name="review_specs[video]['+video+'][url]" type ="text" /></td>';
    html +='<td class="left"><a onclick="jQuery(\'#video' +video+ '\').remove();" class="button"><?php echo "remove"; ?></a></td></tr>';
    html +='</tbody></br>';
    video++;
    jQuery('.add_videos').before(html);
}

</script>