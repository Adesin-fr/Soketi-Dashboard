<script setup>

import CopyIcon from "@/Icons/CopyIcon.vue";
import {ref} from "vue";
import EyeIcon from "@/Icons/EyeIcon.vue";

const props = defineProps(['app'])

const showSecret = ref(false)

const secret = (value) => {
    // Keep the two first and last characters, replace the rest with six *
    return value.substring(0, 2) + '******' + value.substring(value.length - 2)
}

const copy = (value) => {
    navigator.clipboard.writeText(value)
}

</script>

<template>

    <div class="border rounded-md">
        <div class="border-b p-2 font-bold">{{ app.name }}</div>
        <div class="p-2">
            <div>ID : {{ app.id }}</div>
            <div>Key : {{ app.key }}
                <button class="secondary-button !px-2" title="Copy App Key to clipboard" @click="copy(app.key)"><copy-icon/></button>
            </div>
            <div>Secret : {{ showSecret ? app.secret : secret(app.secret) }}
                <button class="secondary-button !px-2"  @click="showSecret = !showSecret"><eye-icon/></button>
                <button class="secondary-button !px-2" title="Copy App Secret to clipboard" @click="copy(app.secret)"><copy-icon/></button>
            </div>
        </div>
        <div class="p-2 italic text-sm">
            Created {{ app.diff_for_humans }}
        </div>
    </div>


</template>

<style scoped>

</style>
