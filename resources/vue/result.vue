<template>
    <tr class="odd:bg-gray-100">
        <td class="w-16 pr-4 text-right">
            {{ result.rank ? result.rank + "." : "" }}
        </td>
        <td>{{ runner.name }}</td>
        <td>{{ runner.club ? runner.club.name : "-" }}</td>
        <td class="w-24 pr-4 text-right">{{ result.start_full }}</td>

        <td class="pr-4 text-right">{{ result.radio1 }}</td>
        <td class="pr-4 text-right">{{ result.radio2 }}</td>
        <!-- <td class="text-right">{{ result.radio3 }}</td>
        <td class="text-right">{{ result.radio4 }}</td> -->
        <td class="pr-4 text-right">{{ result.time }}</td>
        <td class="pr-4 text-right">{{ result.behind }}</td>
    </tr>
</template>

<script lang="ts">
import { Component, Prop } from "vue-property-decorator";
import Vue from "vue";

@Component
export default class VueResult extends Vue {
    @Prop({
        type: Object
    })
    public runner: any;

    @Prop({
        type: Object
    })
    public result: any;
}
</script>
