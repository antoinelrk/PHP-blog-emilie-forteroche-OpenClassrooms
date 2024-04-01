<?php
    /**
     * Affichage de la partie admin : liste des articles avec un bouton "modifier" pour chacun.
     * Et un formulaire pour ajouter un article.
     */
?>

<h2>Administration du blog</h2>

<div class="adminArticle">

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
