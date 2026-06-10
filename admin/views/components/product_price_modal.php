<div
id="priceModal"
class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50"
>

<div class="bg-white p-6 rounded-2xl w-[420px] shadow-xl">

    <!-- TITLE -->
    <h2 class="text-[22px] font-semibold text-gray-800 mb-5">
        Product Price
    </h2>

    <!-- FORM -->
    <form
        method="POST"
        id="priceForm"
        action="index.php?action=savePrice"
    >

        <!-- ID -->
        <input
            type="hidden"
            name="id"
            id="price_id"
        >

        <!-- PRODUCT -->
        <div class="mb-4">

            <label class="block text-sm text-gray-600 mb-2">
                Product
            </label>

            <select
                name="product_id"
                id="price_product"
                class="border border-gray-200 p-3 w-full rounded-xl text-sm outline-none"
                required
            >

                <option value="">
                    Select Product
                </option>

                <?php while($p = mysqli_fetch_assoc($products)): ?>

                <option value="<?= $p['id'] ?>">
                    <?= $p['name'] ?>
                </option>

                <?php endwhile; ?>

            </select>

        </div>

        <!-- STORE -->
        <div class="mb-4">

            <label class="block text-sm text-gray-600 mb-2">
                Store Name
            </label>

            <input
                type="text"
                name="store_name"
                id="price_store"
                placeholder="Example: Watson / Shopee"
                class="border border-gray-200 p-3 w-full rounded-xl text-sm outline-none"
                required
            >

        </div>

        <!-- PRICE -->
        <div class="mb-5">

            <label class="block text-sm text-gray-600 mb-2">
                Price (RM)
            </label>

            <input
                type="number"
                step="0.01"
                name="price"
                id="price_value"
                placeholder="0.00"
                class="border border-gray-200 p-3 w-full rounded-xl text-sm outline-none"
                required
            >

        </div>

        <!-- URL -->
        <div class="mb-5">

            <label class="block text-sm text-gray-600 mb-2">
                Product URL
            </label>

            <input
                type="text"
                name="url"
                id="price_url"
                placeholder="https://example.com"
                class="border border-gray-200 p-3 w-full rounded-xl text-sm outline-none"
            >

        </div>

        <!-- BUTTON -->
        <button
            type="submit"
            class="bg-black hover:bg-gray-800 text-white w-full h-[44px] rounded-xl text-sm"
        >
            Save Price
        </button>

    </form>

    <!-- CANCEL -->
    <button
        onclick="closePriceModal()"
        class="mt-4 text-red-500 hover:underline w-full text-center text-sm"
    >
        Cancel
    </button>

</div>

</div>