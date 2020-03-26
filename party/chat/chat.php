
<div id="messages" class="<?= $_SESSION['id'];?>">
  <!-- les messages du tchat -->
</div>
<label>Message : </label>
<textarea name="message" class="<?= $_GET['id_game'];?>"
   id="message" style="width:200px; height:100px" >
 </textarea><br>
<input type="submit" name="submit" onclick="sending()" value="Envoyez !">
