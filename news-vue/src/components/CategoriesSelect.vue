<template>
    <select name="" id="">
        <option value="science">Science</option>
        <option value="art">Art</option>
        <option value="food">Food</option>
    </select>
</template>

<script>
export default {
    name: 'categories-select',
    props: [
        'categories'
    ]
}
</script>
