<script setup>
import { ref } from "vue";

defineProps({
    collection: {
        type: Array,
        required: true,
    },
});

const currentSelection = ref(1);
const selection = ref([]);

const handleAddToSelection = (e) => {
    e.preventDefault();
    let alreadyExists = false;

    selection.value.forEach((element) => {
        if (element.id === currentSelection.value.id) {
            alreadyExists = true;
            return;
        }
    });

    if (alreadyExists) {
        alert("This value was already selected");
        return;
    }
    selection.value.push(currentSelection.value);
};

const handleRemoveSelection = (id) => {
    selection.value = selection.value.filter((item) => item.id !== id);
};
</script>

<template>
    <select v-model="currentSelection" class="rounded mr-5">
        <option v-for="(item, index) in collection" :key="index" :value="item">
            {{ item?.name }}
        </option>
    </select>
    <button @click="handleAddToSelection">Add</button>
    <div>
        <ul>
            <li v-for="(item, index) in selection" :key="index">
                {{ item.name }}
                <span
                    @click="handleRemoveSelection(item.id)"
                    title="remove"
                    class="cursor-pointer mx-3"
                    >x</span
                >
            </li>
        </ul>
    </div>
</template>
