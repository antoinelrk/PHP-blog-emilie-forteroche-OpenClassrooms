<?php
    /**
     * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun.
     * Et un formulaire pour ajouter un article.
     */
?>

<h2>Administration du blog</h2>

<div class="adminArticle">

    <form class="filter-form" action="../../../index.php?action=monitoring" method="GET">
        <input type="hidden" name="action" value="monitoring">
        <select name="type">
            <option <?= $_GET['type'] === 'title' ? 'selected' : '' ?> value="title">Titre</option>
            <option <?= $_GET['type'] === 'views' ? 'selected' : '' ?>  value="views">Nombre de vues</option>
            <option <?= $_GET['type'] === 'comments' ? 'selected' : '' ?>  value="comments">Nombre de commentaires</option>
            <option <?= $_GET['type'] === 'created_at' ? 'selected' : '' ?>  value="created_at">Date de création</option>
        </select>
        <select name="order">
            <option <?= $_GET['order'] === 'desc' ? 'selected' : '' ?> value="desc">A-Z</option>
            <option <?= $_GET['order'] === 'asc' ? 'selected' : '' ?> value="asc">Z-A</option>
        </select>
        <button class="filter-btn" type="submit">
            Trier
        </button>
    </form>

    <table class="table-articles">
        <tr class="table-title">
            <th class="article-title">Title</th>
            <th class="article-view">Viewed</th>
            <th class="article-comments">Comments</th>
            <th class="article-date">Created at</th>
            <th class="article-controls"></th>
        </tr>
        <?php foreach ($articles as $article): ?>
            <tr class="table-line">
                <td class="article-title">
                    <?= $article->getTitle() ?>
                </td>
                <td class="article-view">
                    <?= $article->getViewed() ?>
                </td>
                <td class="article-comments">
                    <?= $article->getNumberOfComments() ?>
                </td>
                <td class="article-date">
                    <?= Utils::convertDateToFrenchFormat($article->getDateCreation(), 'dd/MM/Y') ?>
                </td>
                <td class="article-controls">
                    <a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $article->getId() ?>">
                        Modifier
                    </a>
                    <a
                        class="submit"
                        href="index.php?action=deleteArticle&id=<?= $article->getId() ?>"
                        <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?>
                    >
                        Supprimer
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>
