<template>
    <tr
        class="odd:bg-gray-100"
        :class="{
            'bg-red-300': isRecentlyUpdated,
            'odd:bg-red-300': isRecentlyUpdated
        }"
    >
        <td class="w-16 pr-4 text-right">
            {{ result.rank ? result.rank + "." : "" }}
        </td>
        <td>{{ runner.name }}</td>
        <td class="w-24 pr-4 text-right">{{ result.start_full }}</td>

        <td>{{ runner.club ? runner.club.name : "-" }}</td>

        <td v-if="radioIsUsed.radio1" class="pr-4 text-right">
            {{ result.radio1 }}
        </td>
        <td v-if="radioIsUsed.radio2" class="pr-4 text-right">
            {{ result.radio2 }}
        </td>
        <td v-if="radioIsUsed.radio3" class="pr-4 text-right">
            {{ result.radio3 }}
        </td>
        <td v-if="radioIsUsed.radio4" class="pr-4 text-right">
            {{ result.radio4 }}
        </td>
        <td class="pr-4 text-right">{{ result.time }}</td>
        <td class="pr-4 text-right">{{ result.behind }}</td>
    </tr>
</template>

<script lang="ts">
import { Component, Prop } from "vue-property-decorator";
import Vue from "vue";
import * as moment from "moment";
import { IResult } from "./result.interface";

@Component
export default class VueResult extends Vue {
    @Prop({
        type: Object
    })
    public runner: any;

    @Prop({
        type: Object
    })
    public result: IResult;

    @Prop({
        type: Object
    })
    radioIsUsed: {
        radio1: boolean;
        radio2: boolean;
        radio3: boolean;
        radio4: boolean;
    };

    public get isRecentlyUpdated(): boolean {
        const lastUpdate = moment(this.result.last_update);
        const now = moment();

        return now.diff(lastUpdate, "minutes") < 2;
    }
}
</script>
