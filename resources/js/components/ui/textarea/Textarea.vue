<script setup lang="ts">
import  { HTMLAttributes, onBeforeUnmount, onMounted, ref, watch } from 'vue'
import { cn } from '@/lib/utils'
import { useVModel } from '@vueuse/core'
import autosize from 'autosize'


const props = defineProps<{
  defaultValue?: string | number
  modelValue?: string | number
  class?: HTMLAttributes['class']
    id?: string
    name?: string
    ariaLabel?: string
}>()

const emits = defineEmits<{
  (e: 'update:modelValue', payload: string | number): void
}>()

const modelValue = useVModel(props, 'modelValue', emits, {
  defaultValue: props.defaultValue,
})

const textareaRef = ref<HTMLTextAreaElement | null>(null)

onMounted(() => {
    if (textareaRef.value) {
        autosize(textareaRef.value)
    }
})
watch(modelValue, () => {
    if (textareaRef.value) {
        autosize.update(textareaRef.value)
    }
})

onBeforeUnmount(() => {
    if (textareaRef.value) {
        autosize.destroy(textareaRef.value)
    }
})

</script>

<template>
  <textarea
      ref="textareaRef"
      v-model="modelValue"
      data-slot="textarea"
      :id="props.id"
      :name="props.name"
      :aria-label="props.ariaLabel"
      :class="cn(
      'file:text-foreground placeholder:text-muted-foreground selection:bg-primary selection:text-primary-foreground dark:bg-input/30 border-input flex h-9 w-full min-w-0 rounded-md border bg-transparent px-3 py-1 text-base shadow-xs transition-[color,box-shadow] outline-none file:inline-flex file:h-7 file:border-0 file:bg-transparent file:text-sm file:font-medium disabled:pointer-events-none disabled:cursor-not-allowed disabled:opacity-50 md:text-sm',
      'focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px]',
      'aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive',
      props.class,
    )"
  />
</template>
