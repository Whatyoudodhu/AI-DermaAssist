<!-- ================= MODAL ================= -->
<div
id="modal"
class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50"
>

<div class="bg-white p-6 rounded-2xl w-[420px] shadow-xl">

    <!-- TITLE -->
    <h2 class="text-[22px] font-semibold text-gray-800 mb-5">
        Add Product Skin Tone
    </h2>

    <!-- FORM -->
    <form
        method="POST"
        id="pstoneForm"
        action="index.php?action=savePSToneForm"
    >

        <!-- PRODUCT -->
        <div class="mb-4">

            <label class="block text-sm text-gray-600 mb-2">
                Product
            </label>

            <select
                name="product_id"
                class="border border-gray-200 p-3 w-full rounded-xl text-sm outline-none"
                required
            >

                <option value="">
                    Select Product
                </option>

                <?php

                $products = mysqli_query(
                    Database::connect(),
                    "SELECT * FROM products"
                );

                while($p = mysqli_fetch_assoc($products)):

                ?>

                <option value="<?= $p['id'] ?>">
                    <?= $p['name'] ?>
                </option>

                <?php endwhile; ?>

            </select>

        </div>

        <!-- SKIN TONE -->
        <div class="mb-4">

            <label class="block text-sm text-gray-600 mb-2">
                Skin Tone
            </label>

            <!-- SELECT -->
            <select
                id="skinToneSelect"
                class="border border-gray-200 p-3 w-full rounded-xl text-sm outline-none"
            >

                <option value="">
                    Select Skin Tone
                </option>

                <?php

                $tones = mysqli_query(
                    Database::connect(),
                    "SELECT * FROM skin_tones"
                );

                while($t = mysqli_fetch_assoc($tones)):

                ?>

                <option value="<?= $t['id'] ?>">
                    <?= $t['name'] ?>
                </option>

                <?php endwhile; ?>

            </select>

            <p class="text-xs text-gray-400 mt-2">
                Select multiple skin tones
            </p>

            <!-- TAG RESULT -->
            <div
                id="selectedSkinTones"
                class="flex flex-wrap gap-2 mt-3"
            >
            </div>

            <!-- HIDDEN INPUT -->
            <div id="hiddenSkinToneInputs"></div>

        </div>

        <!-- BUTTON -->
        <button
            type="submit"
            class="bg-black hover:bg-gray-800 text-white w-full h-[44px] rounded-xl text-sm"
        >
            Save
        </button>

    </form>

    <!-- CANCEL -->
    <button
        onclick="closeModal()"
        class="mt-4 text-red-500 hover:underline w-full text-center text-sm"
    >
        Cancel
    </button>

</div>

</div>