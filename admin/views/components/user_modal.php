<div
id="userModal"
class="fixed inset-0 bg-black/50 hidden justify-center items-center z-50"
>

<div class="bg-white w-[400px] rounded-lg p-6">

<div class="flex justify-between items-center mb-4">

<h2 class="text-lg font-bold">
    User Form
</h2>

<button
type="button"
onclick="closeUserModal()"
class="text-gray-500"
>
    ✕
</button>

</div>

<form
method="POST"
action="index.php?action=saveUser"
id="userForm"
>

<input type="hidden" name="id" id="user_id">

<!-- NAME -->
<div class="mb-3">

<label class="block mb-1">
    Name
</label>

<input
type="text"
name="name"
id="user_name"
class="w-full border p-2 rounded"
required
>

</div>

<!-- EMAIL -->
<div class="mb-3">

<label class="block mb-1">
    Email
</label>

<input
type="email"
name="email"
id="user_email"
class="w-full border p-2 rounded"
required
>

</div>

<!-- PASSWORD -->
<div class="mb-4" id="passwordDiv">

<label class="block mb-1">
    Password
</label>

<input
type="password"
name="password"
id="user_password"
class="w-full border p-2 rounded"
>

</div>

<button
class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded w-full"
>
    Save User
</button>

</form>

</div>

</div>