<?php

/*
 * LAYOUT DECLARATIONS (v1.2 and up)
 */

function scratch_row_start() {
  global $row_count, $column_count, $columns;
  if($columns !== 'custom') {
    if(($column_count - 1) % $columns === 0) {
      echo '<div class="clearfix row-' . $row_count . '">';
    }
  }
}

function scratch_column_start() {
  global $cells, $column_count, $last, $twelvecol, $columns;
  $class = scratch_column_class();
  echo '<div class="' . $class . ' column-' . $column_count . '">';
  $last = strpos($class, 'last');
  $twelvecol = strpos($class, 'twelvecol');
}

function scratch_column_end() {
  global $column_count;
  echo '</div> <!-- /.column-' . $column_count . ' -->';
}

function scratch_row_end() {
  global $cells, $flex, $row_count, $column_count, $last, $twelvecol, $columns;
  if($columns !== 'custom') {
    if($last !== false || $twelvecol !== false || $column_count === count($cells) && $flex === false) {
      echo '</div> <!-- /.row-' . $row_count . ' -->';
      $row_count++;
    }
  }
  $column_count++;
}

function scratch_column_class() {
  global $cells, $column_count, $columns, $flex, $offset;
  switch($columns) {
    case 2:
      if($offset === '1:2') {
        return two_columns_12($column_count);
      } elseif($offset === '2:1') {
        return two_columns_21($column_count);
      } else {
        if($flex === true) {
          return two_columns_flex($cells, $column_count);
        } else {
          return two_columns($column_count);
        }
      }
      break;
    case 3:
      if($offset === '1:1:2') {
        return three_columns_112($column_count);
      } elseif($offset === '1:2:1') {
        return three_columns_121($column_count);
      } elseif($offset === '2:1:1') {
        return three_columns_211($column_count);
      } else {
        if($flex === true) {
          return three_columns_flex($cells, $column_count);
        } else {
          return three_columns($column_count);
        }
      }
      break;
    case 4:
      if($flex === true) {
        return four_columns_flex($cells, $column_count);
      } else {
        return four_columns($column_count);
      }
      break;
    case 5:
      if($flex === true) {
        return five_columns_flex($cells, $column_count);
      } else {
        return five_columns($column_count);
      }
      break;
    case 6:
      if($flex === true) {
        return six_columns_flex($cells, $column_count);
      } else {
        return six_columns($column_count);
      }
      break;
    case 'custom':
      return custom_columns($column_count);
      break;
    default:
      return 'error';
      break;
  }
}

function scratch_layout_declare($cells, $columns, $flex = true, $offset = null) {
  $GLOBALS['cells'] = $cells;
  $GLOBALS['row_count'] = $GLOBALS['column_count'] = 1;
  $GLOBALS['last'] = $GLOBALS['twelvecol'] = false;
  $GLOBALS['columns'] = $columns;
  $GLOBALS['flex'] = $flex;
  $GLOBALS['offset'] = $offset;
}

function scratch_layout_start() {
  scratch_row_start();
  scratch_column_start();
}

function scratch_layout_end() {
  scratch_column_end();
  scratch_row_end();
}

?>
