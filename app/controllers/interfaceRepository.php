<?php

namespace Altum\Controllers;

use Altum\Middlewares\Authentication;
use Altum\Models\Domain;

class interfaceRepository extends Controller
{
    public function index()
    {

        Authentication::guard();

        /* Prepare the filtering system */
        $filters = (new \Altum\Filters(['is_enabled', 'type'], ['url'], ['datetime', 'clicks', 'url']));

        /* Prepare the paginator */
        $total_rows = database()->query("SELECT COUNT(*) AS `total` FROM `links` WHERE `user_id` = {$this->user->user_id}")->fetch_object()->total ?? 0;
        $paginator = (new \Altum\Paginator($total_rows, 25, $_GET['page'] ?? 1, url('links?' . $filters->get_get() . '&page=%d')));

        /* Get the links list for the project */
        $links_result = database()->query("
            SELECT 
                `links`.*
            FROM 
                `links`
            JOIN 
                `users` on `links`.`user_id` = `users`.`user_id`
            WHERE 
                `users`.`type` = 1
            {$paginator->get_sql_limit()}
        ");

        /* Iterate over the links */
        $links = [];

        while ($row = $links_result->fetch_object()) {
            $row->full_url = $row->domain_id ? $row->scheme . $row->host . '/' . $row->url : url($row->url);

            $links[] = $row;
        }

        /* Prepare the pagination view */
        $pagination = (new \Altum\Views\View('partials/pagination', (array) $this))->run(['paginator' => $paginator]);

        /* Delete Modal */
        $view = new \Altum\Views\View('links/link_delete_modal', (array) $this);
        \Altum\Event::add_content($view->run(), 'modals');

        /* Create Link Modal */
        $domains = (new Domain())->get_domains($this->user);
        $data = [
            'domains' => $domains
        ];

        $view = new \Altum\Views\View('links/create_link_modals', (array) $this);
        \Altum\Event::add_content($view->run($data), 'modals');

        /* Existing projects */
        $projects = (new \Altum\Models\Project())->get_projectsByAdmin();

        /* Prepare the Links View */
        $data = [
            'links'             => $links,
            'pagination'        => $pagination,
            'filters'           => $filters,
            'projects'          => $projects
        ];
        $view = new \Altum\Views\View('interface-repository/content', (array) $this);
        $this->add_view_content('content', $view->run($data));

        $view = new \Altum\Views\View('interface-repository/index', (array) $this);

        $this->add_view_content('content', $view->run($data));
    }

    
}
