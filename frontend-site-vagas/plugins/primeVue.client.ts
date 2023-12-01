import PrimeVue from "primevue/config";
import Card from "primevue/card";
import InputText from "primevue/inputtext";
import Password from "primevue/password";
import Button from "primevue/button";
import InputMask from 'primevue/inputmask';
import InputNumber from 'primevue/inputnumber';
import Dropdown from 'primevue/dropdown';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';   // optional
import Row from 'primevue/row';
import Paginator from 'primevue/paginator';
import InputSwitch from 'primevue/inputswitch';

export default defineNuxtPlugin((nuxtApp) => {
	nuxtApp.vueApp.use(PrimeVue);
	nuxtApp.vueApp.component("Card", Card);
	nuxtApp.vueApp.component("InputText", InputText);
	nuxtApp.vueApp.component("Password", Password);
	nuxtApp.vueApp.component("Button", Button);
	nuxtApp.vueApp.component("InputMask", InputMask);
	nuxtApp.vueApp.component("InputNumber", InputNumber);
	nuxtApp.vueApp.component("Dropdown", Dropdown);
	nuxtApp.vueApp.component("DataTable", DataTable);
	nuxtApp.vueApp.component("Column", Column);
	nuxtApp.vueApp.component("ColumnGroup", ColumnGroup);
	nuxtApp.vueApp.component("Row", Row);
	nuxtApp.vueApp.component("Paginator", Paginator);
	nuxtApp.vueApp.component("InputSwitch", InputSwitch);
});