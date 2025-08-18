<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Form, Head } from '@inertiajs/vue3';
import { Button } from '@/components/ui/button';
import InputError from '@/components/InputError.vue';
import { Textarea } from '@/components/ui/textarea';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Chirps',
        href: route('chirps.index'),
    },
];

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
                v-slot="{ errors }"
            >
                <Textarea
                    id="message"
                    name="message"
                    placeholder="What's on your mind?"
                ></Textarea>
                <InputError :message="errors.message"/>
                <Button class="mt-2" variant="secondary">
                    Chirp
                </Button>
            </Form>
        </div>
    </AppLayout>
</template>
