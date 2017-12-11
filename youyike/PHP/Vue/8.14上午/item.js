Vue.component('item',function () {
    props:['data'],
    template=
            `
            <li>
                 <span id="{{data.id}}">-{{data.name}}</span>
            </li>
            `
})
