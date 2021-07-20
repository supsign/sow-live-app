<template>
        <tr>
            <td class="w-24 pr-4 text-right">{{ result.rank ? result.rank + '.' : "" }}</td>
            <td>{{ runner.name }}</td>
            <td>{{ result.start }}</td>
            <td>{{ runner.club ? "club" : "" }}</td>
            <td>{{ result.radio1 }}</td>
            <td>{{ result.radio2 }}</td>
            <td>{{ result.radio3 }}</td>
            <td>{{ result.radio4 }}</td>
            <td>{{ result.time }}</td>
            <td>{{ result.behind }}</td>
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
