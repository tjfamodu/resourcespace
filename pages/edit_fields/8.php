<?php /* -------- Formatted CKeditor text area entry ---------------- */ ?>

<br /><br />
<textarea class="stdwidth" rows=20 cols=80 name="<?php echo $name?>" id="<?php echo $name?>" <?php echo $help_js; ?>
><?php echo htmlspecialchars($value)?></textarea>


<script type="text/javascript">

// Replace the <textarea id="editor1"> with an CKEditor instance.
<?php if(!hook("ckeditorinit")): ?>
var editor = CKEDITOR.instances['<?php echo $name?>'];
if (editor) { editor.destroy(true); }
CKEDITOR.replace('<?php echo $name ?>',
	{
		// Defines a simpler toolbar to be used in this sample.
		// Note that we have added out "MyButton" button here.
		toolbar : [ [ <?php global $ckeditor_toolbars;echo $ckeditor_toolbars; ?> ] ],
		height: "350"

	});
var editor = CKEDITOR.instances['<?php echo $name?>'];
<?php endif; ?>

<?php hook("ckeditoroptions"); ?>

<?php 
# Add an event handler to auto save this field if changed.
if ($edit_autosave) {?>
editor.on('blur',function(e) 
	{
	if(editor.checkDirty())
		{
		editor.updateElement();
		AutoSave('<?php echo $fields[$n]["ref"]?>');
		}
	});
<?php } ?>

</script>

