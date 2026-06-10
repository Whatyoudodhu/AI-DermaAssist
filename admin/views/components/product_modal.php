<!-- ================= MODAL ================= -->
<div id="modal" class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50">

<div class="bg-white p-6 rounded-xl w-[400px] shadow-lg">

<h2 class="text-xl mb-3 font-semibold" id="title">Add Product</h2>

<form method="POST" action="index.php?action=saveProduct">

<input type="hidden" name="id" id="id">

<input name="name" id="name" placeholder="Name"
class="border p-2 w-full mb-2 rounded" required>

<input name="brand" id="brand" placeholder="Brand"
class="border p-2 w-full mb-2 rounded" required>

<input name="image_url" id="image" placeholder="Image URL"
class="border p-2 w-full mb-2 rounded">

<textarea name="description" id="desc"
placeholder="Description"
class="border p-2 w-full mb-2 rounded"></textarea>

<button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 w-full rounded">
Save
</button>

</form>

<button onclick="closeModal()" 
class="mt-3 text-red-500 hover:underline w-full text-center">
Cancel
</button>

</div>
</div>