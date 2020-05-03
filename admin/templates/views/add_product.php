<form action="" method="post"> 
    <div class="form-group">
        <label for="">Titre du produit</label>
        <input type="text" class="form-control" name="name_product">
    </div>
    <div class="form-group">
        <label for=" image_product">image product</label>
        <input type="text" name="image_product" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Description du produit</label>
        <textarea name="description_product" id="" cols="30" rows="10">

        </textarea>
    </div>
    <div class="form-group">
        <label for="">Prix du produit</label>
        <input type="number" class="form-control" name="price_product">
    </div>
    <div class="form-group">
        <label for="">Catégorie</label>
        <input type="text" class="form-control" name="category">
    </div>
    <input type="hidden" name="path" value="admin">
    <input type="hidden" name="class" value="add_product">
    <button type="submit" class="btn btn-success">ajouter</button>
</form>