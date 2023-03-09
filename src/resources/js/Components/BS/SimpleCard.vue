<template>
  <div class="card shadow mb-3">
    <div
      v-if="$slots.header"
      class="card-header"
    >
      <slot name="header" />
    </div>
    <div
      v-if="$slots.body"
      class="card-body"
    >
      <slot name="body" />
    </div>
    <div
      v-if="$slots.footer"
      class="card-footer"
    >
      <slot name="footer" />
    </div>
  </div>
</template>
