<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Form, Head } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import { ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Chirps',
        href: route('chirps.index'),
    },
];

const message = ref<string>('');

defineProps(['title', 'subtitle']);
const submit = () => {
    // Handle form submission logic here
    console.log(message.value);
};
</script>

<template>
    <Head title="Chirps" >
        <meta name="description" content="Chirps description" />
    </Head>

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4 overflow-x-auto">
            <Form
                method="post"
                :action="route('chirps.store')"
                :reset-on-success="['message']"
            >
                <textarea
                    v-model="message"
                    placeholder="What's on your mind?"
                    class="block w-full rounded-md border-gray-300 bg-white shadow-sm transition-colors duration-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50"
                ></textarea>
                <Button class="mt-2" variant="secondary">
                    Chirp
                </Button>
            </Form>
        </div>
    </AppLayout>
</template>
