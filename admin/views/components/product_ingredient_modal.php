<div
id="ingredientModal"
class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50"
>

<div class="bg-white p-6 rounded-2xl w-[420px] shadow-xl">

    <h2 class="text-[22px] font-semibold mb-5">
        Add Product Ingredient
    </h2>

    <form
        method="POST"
        id="ingredientForm"
        action="index.php?action=saveProductIngredients"
    >

        <!-- PRODUCT -->
        <div class="mb-4">

            <label class="block text-sm mb-2">
                Product
            </label>

            <select
                name="product_id"
                id="ingredient_product"
                class="border border-gray-200 p-3 w-full rounded-xl"
                required
            >

                <option value="">
                    Select Product
                </option>

                <?php
                $products->data_seek(0);

                while($p = $products->fetch_assoc()):
                ?>

                <option value="<?= $p['id'] ?>">
                    <?= $p['name'] ?>
                </option>

                <?php endwhile; ?>

            </select>

        </div>

        <!-- INGREDIENT -->
        <div class="mb-4">

            <label class="block text-sm mb-2">
                Ingredient
            </label>

            <select
                id="ingredientSelect"
                class="border border-gray-200 p-3 w-full rounded-xl"
            >

                <option value="">
                    Select Ingredient
                </option>

                <?php
                $ingredients->data_seek(0);

                while($i = $ingredients->fetch_assoc()):
                ?>

                <option value="<?= $i['id'] ?>">
                    <?= $i['name'] ?>
                </option>

                <?php endwhile; ?>

            </select>

            <!-- TAG -->
            <div
                id="selectedIngredients"
                class="flex flex-wrap gap-2 mt-3"
            >
            </div>

            <!-- HIDDEN -->
            <div id="hiddenIngredientInputs"></div>

        </div>

        <button
            type="submit"
            class="bg-black text-white w-full h-[44px] rounded-xl"
        >
            Save
        </button>

    </form>

    <button
        onclick="closeProductIngredientModal()"
        class="mt-4 text-red-500 w-full"
    >
        Cancel
    </button>

</div>

</div>