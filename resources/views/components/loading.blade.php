<div class="progress-xxs" id="loading">
    <div class="progress-bar progress-bar-info progress-bar-striped indeterminate" style="width: 100%;">
    </div>
</div>

<style>

    .progress-bar.indeterminate {
        position: relative;
        animation: progress-indeterminate 3s linear infinite;
    }

    @keyframes progress-indeterminate {
        from { left: -25%; width: 25%; }
        to { left: 100%; width: 25%;}
    }

</style>