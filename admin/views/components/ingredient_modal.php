<!-- ================= MODAL ================= -->
<div
id="ingredientModal"
class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50"
>

<div class="bg-white p-6 rounded-2xl w-[420px] shadow-xl">

    <!-- TITLE -->
    <h2 class="text-[22px] font-semibold text-gray-800 mb-5">
        Ingredient
    </h2>

    <!-- FORM -->
    <form
        method="POST"
        action="index.php?action=addIngredient"
    >

        <!-- ID -->
        <input
            type="hidden"
            name="id"
            id="ingredient_id"
        >

        <!-- NAME -->
        <div class="mb-4">

            <label class="block text-sm text-gray-600 mb-2">
                Ingredient Name
            </label>

            <input
                type="text"
                name="name"
                id="ingredient_name"
                placeholder="Enter ingredient name"
                class="border border-gray-200 p-3 w-full rounded-xl text-sm outline-none"
                required
            >

        </div>

        <!-- SAFETY -->
        <div class="mb-4">

            <label class="block text-sm text-gray-600 mb-2">
                Safety
            </label>

            <select
                name="safety"
                id="ingredient_safety"
                class="border border-gray-200 p-3 w-full rounded-xl text-sm outline-none"
                required
            >
                <option value="safe">
                    Safe
                </option>

                <option value="caution">
                    Caution
                </option>

                <option value="harmful">
                    Harmful
                </option>
            </select>

        </div>

        <!-- NOTES -->
        <div class="mb-5">

            <label class="block text-sm text-gray-600 mb-2">
                Notes
            </label>

            <textarea
                name="notes"
                id="ingredient_notes"
                rows="4"
                placeholder="Ingredient notes..."
                class="border border-gray-200 p-3 w-full rounded-xl text-sm outline-none resize-none"
            ></textarea>

        </div>

        <!-- BUTTON -->
        <button
            type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white w-full h-[44px] rounded-xl text-sm"
        >
            Save Ingredient
        </button>

    </form>

    <!-- CANCEL -->
    <button
        onclick="closeIngredientModal()"
        class="mt-4 text-red-500 hover:underline w-full text-center text-sm"
    >
        Cancel
    </button>

</div>

</div>