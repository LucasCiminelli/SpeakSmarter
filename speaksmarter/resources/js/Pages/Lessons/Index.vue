<script>
export default {
    name: "LessonsIndex",
};
</script>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    lessons: {
        type: Object,
        required: true,
    },
});

const deleteLesson = (id) => {
    if (confirm("are you sure?")) {
        Inertia.delete(route("lessons.destroy", id));
    }
};
</script>

<template>
    <AppLayout>
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                Lessons
            </h1>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div
                            class="flex justify-between"
                            v-if="
                                $page.props.user.permissions.includes(
                                    'create lessons'
                                )
                            "
                        >
                            <Link
                                :href="route('lessons.create')"
                                class="bg-indigo-500 hover:bg-indigo-700 rounded py-3 px-3 text-white"
                            >
                                Create Lesson
                            </Link>
                        </div>
                    </div>

                    <div class="mt-4">
                        <ul role="list" class="divide-y divide-gray-100">
                            <li
                                class="flex justify-between gap-x-6 py-5"
                                v-for="lesson in lessons.data"
                            >
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p
                                            class="text-md/6 font-semibold text-gray-900"
                                        >
                                            {{ lesson.name }}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="hidden shrink-0 sm:flex sm:flex-col sm:items-end"
                                >
                                    <p class="text-sm/6 text-gray-900">
                                        <Link
                                            class="py-2 px-3"
                                            :href="
                                                route(
                                                    'lessons.edit',
                                                    lesson.id
                                                )
                                            "
                                            v-if="
                                                $page.props.user.permissions.includes(
                                                    'update lessons'
                                                )
                                            "
                                        >
                                            Edit
                                        </Link>
                                        |
                                        <Link
                                            class="py-2 px-3 text-red-600"
                                            @click="deleteLesson(lesson.id)"
                                            v-if="
                                                $page.props.user.permissions.includes(
                                                    'delete lessons'
                                                )
                                            "
                                        >
                                            Delete
                                        </Link>
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="flex justify-between mt-2">
                        <div>
                            <Link v-if="lessons.current_page > 1" :href="lessons.prev_page_url" class="rounded py-3 px-3">
                                < PREVIOUS
                            </Link>
                        </div>

                        <Link v-if="lessons.current_page < lessons.last_page" :href="lessons.next_page_url" class="rounded py-3 px-3">
                            NEXT >
                        </Link>
                    </div>
                </div>
            </div>
        </template>
    </AppLayout>
</template>
