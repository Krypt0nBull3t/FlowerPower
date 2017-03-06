<?php

/**
 * When creating a JQgrid with pager, 
 * this function can be used to get the numbers the pager needs
 * 
 * @param databasetable $table
 * @return array $pager 
 */
function getPager($table, $where = null) {
    $dbc = connDatabase::GetInstance();

    $pager = array();

    $pager['pageRows'] = $_GET['rows'];
    $pager['totalRows'] = $dbc->queryFetchColAssoc("SELECT COUNT(*) $table $where");
    $pager['totalPages'] = ceil($pager['totalRows'] / $pager['pageRows']);
    $pager['currentPage'] = $_GET['page'];

    $pager['startRow'] = ($pager['currentPage'] * $pager['pageRows']) - $pager['pageRows'] + 1;
    $pager['endRow'] = $pager['startRow'] + $pager['pageRows'];

    return $pager;
}

/**
 * When creating a JQgrid with filter,
 * this function can be used to get all the data fields from the filter
 * and build a WHERE string for the query.
 * 
 * @return string WHERE for the query
 */
function getFilter() {
    if (isset($_GET['filters'])) {
        $filter = array();

        $json = json_decode($_GET['filters'], true);

        if (!empty($json['rules'])) {
            $rules = $json['rules'];

            foreach ($rules as $gridfilter) {
                $filter[] = " " . $gridfilter['field'] . " LIKE '%" . $gridfilter['data'] . "%' ";
            }
        }
        return $filter;
    }
}

/**
 * When creating a JQgrid with columnordering enabled,
 * this function can be used to get the order. 
 * If not set the given default order by is returned.
 * 
 * @param type $defaultColumn
 * @param type $defaultDirection 
 * 
 * @return string ORDER BY for the query
 */
function getOrderBy($defaultColumn, $defaultDirection) {
    if (!empty($_GET['sidx'])) {
        $orderby = "ORDER BY " . $_GET['sidx'] . " " . $_GET['sord'];
    } else {
        $orderby = "ORDER BY $defaultColumn $defaultDirection";
    }

    return $orderby;
}

?>