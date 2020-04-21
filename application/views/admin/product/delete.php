
<h2>Delete Product</h2>



<p>Are you want to delete <b>"<?php echo $data['name']; ?>"</b>?</p>

<form method="post">
    <input style="font-weight: bold;cursor: pointer" type="submit" name="submit" value="DELETE">
    <a style="margin-left: 20px;font-weight: bold;cursor: pointer"  href="/admin/product/">CANCEL</a>
</form>