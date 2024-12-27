
<script>
export default {
    methods: {
        openNewTab() {
            window.open('/add-employees', '_blank');
        }
    }
}
</script>

<template>
    <div class="flex justify-end p-6">
        <button @click="openNewTab" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded hover:bg-blue-700">
            Adicionar funcionários
        </button>
    </div>
</template>

