<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/inertia-vue3';
</script>

<template>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <Link
        class="navbar-brand"
        :href="'/'"
      >
        IMS
      </Link>
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
      <div
        id="navbarSupportedContent"
        class="collapse navbar-collapse"
      >
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <Link
              class="nav-link"
              :href="route('dashboard')"
            >
              Dashboard
            </Link>
          </li>
          <li class="nav-item">
            <Link
              class="nav-link"
              :href="route('types.index')"
            >
              Types
            </Link>
          </li>
          <li class="nav-item">
            <Link
              class="nav-link"
              :href="route('items.index')"
            >
              Items
            </Link>
          </li>
            <li class="nav-item">
                <Link
                    class="nav-link"
                    :href="route('owners.index')"
                >
                    Owners
                </Link>
            </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li>
                <a
                  class="dropdown-item"
                  href="#"
                >Action</a>
              </li>
              <li>
                <a
                  class="dropdown-item"
                  href="#"
                >Another action</a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a
                  class="dropdown-item"
                  href="#"
                >Something else here</a>
              </li>
            </ul>
          </li>
        </ul>

        <div class="nav-item">
          <p class="mb-0 me-2">
            {{ $page.props.auth.user.name }}, {{ $page.props.auth.user.email }}
          </p>
        </div>
        <div class="nav-item">
          <Link
            class="btn btn-outline-primary me-2"
            :href="route('profile.edit')"
          >
            Profile
          </Link>

          <DropdownLink
            class="btn btn-outline-warning"
            :href="route('logout')"
            method="post"
            as="button"
          >
            Log Out
          </DropdownLink>
        </div>
      </div>
    </div>
  </nav>

  <div>
    <div>
      <!-- Page Heading -->
      <header v-if="$slots.header">
        <slot name="header" />
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
    </div>
  </div>
</template>
