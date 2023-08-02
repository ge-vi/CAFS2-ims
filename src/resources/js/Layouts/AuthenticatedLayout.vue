<script setup>
import { Link } from '@inertiajs/vue3';
import ButtonLink from '@/Components/BS/ButtonLink.vue';
</script>

<template>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <Link class="navbar-brand" :href="'/'"> IMS </Link>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon" />
      </button>
      <div id="navbarSupportedContent" class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <Link class="nav-link" :href="route('dashboard')"> Dashboard </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" :href="route('types.index')"> Types </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" :href="route('items.index')"> Items </Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link" :href="route('owners.index')"> Owners </Link>
          </li>
        </ul>

        <div class="nav-item">
          <p class="mb-0 me-2">
            {{ $page.props.auth.user.name }},
            {{ $page.props.auth.user.email }}
          </p>
        </div>
        <div class="nav-item">
          <Link
            class="btn btn-outline-primary me-2"
            :href="route('profile.edit')"
          >
            Profile
          </Link>

          <ButtonLink
            as="button"
            class="btn btn-outline-warning"
            :href="route('logout')"
            method="post"
          >
            Log Out
          </ButtonLink>
        </div>
      </div>
    </div>
  </nav>

  <!-- Page Heading -->
  <header v-if="$slots.header">
    <h2 class="h2 text-center my-3">
      <slot name="header" />
    </h2>
  </header>

  <!-- Page Content -->
  <div
    v-if="$page.props.flash.message"
    class="alert alert-primary my-2"
    role="alert"
  >
    {{ $page.props.flash.message }}
  </div>
  <main>
    <slot />
  </main>
</template>
