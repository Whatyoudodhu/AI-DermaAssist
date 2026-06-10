<div class="ml-64 p-6">

<h1 class="text-2xl font-bold mb-6">🏪 Store Management</h1>

<select id="product_id" class="border p-2 mb-4">
<option value="">Select Product</option>

<?php while($p = $products->fetch_assoc()): ?>
    <option value="<?= $p['id'] ?>">
        <?= htmlspecialchars($p['name']) ?>
    </option>
<?php endwhile; ?>

</select>

<div class="bg-white p-4 mb-4">

<input id="store" placeholder="Store Name" class="border p-2 mb-2 w-full">
<input id="price" placeholder="Price" class="border p-2 mb-2 w-full">
<input id="url" placeholder="URL" class="border p-2 mb-2 w-full">

<button onclick="addStore()" class="bg-green-500 text-white px-4 py-2">
Add
</button>

</div>

<table class="w-full bg-white">
<tr class="border-b">
<th class="p-2 text-left">Store</th>
<th>Price</th>
<th>Link</th>
</tr>

<tbody id="storeTable"></tbody>
</table>

</div>