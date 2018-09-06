<?php

/*
 * LAYOUT FUNCTIONS
 * Feel free to create your own layout functions in `functions.php`, or
 * write your own calls to these in your template files.
 */

function two_columns($count) {
  $string = "sixcol";
  if($count % 2 == 0) {
    $string .= " last";
  } else {
    $string .= " first";
  }
  return $string;
}

function two_columns_12($count) {
  if($count % 2 == 0) {
    $string = "eightcol last";
  } else {
    $string = "fourcol first";
  }
  return $string;
}

function two_columns_21($count) {
  if($count % 2 == 0) {
    $string = "fourcol last";
  } else {
    $string = "eightcol first";
  }
  return $string;
}

function three_columns($count) {
  $string = "fourcol";
  if($count % 3 == 0) {
    $string .= " last";
  } elseif(($count - 1) % 3 == 0) {
    $string .= " first";
  }
  return $string;
}

function three_columns_112($count) {
  $string = "threecol";
  if($count % 3 == 0) {
    $string = "sixcol last";
  } elseif(($count - 1) % 3 == 0) {
    $string .= " first";
  }
  return $string;
}

function three_columns_121($count) {
  $string = "sixcol";
  if($count % 3 == 0) {
    $string = "threecol last";
  } elseif(($count - 1) % 3 == 0) {
    $string = "threecol first";
  }
  return $string;
}

function three_columns_211($count) {
  $string = "threecol";
  if($count % 3 == 0) {
    $string .= " last";
  } elseif(($count - 1) % 3 == 0) {
    $string = "sixcol first";
  }
  return $string;
}

function four_columns($count) {
  $string = "threecol";
  if($count % 4 == 0) {
    $string .= " last";
  } elseif(($count - 1) % 4 == 0) {
    $string .= " first";
  }
  return $string;
}

function five_columns($count) {
  $string = "twoptfourcol";
  if($count % 5 == 0) {
    $string .= " last";
  } elseif(($count - 1) % 5 == 0) {
    $string .= " first";
  }
  return $string;
}

function six_columns($count) {
  $string = "twocol";
  if($count % 6 == 0) {
    $string .= " last";
  } elseif(($count - 1) % 6 == 0) {
    $string .= " first";
  }
  return $string;
}

function custom_columns($count) {

  $string = "custom-col";

  if($count % 2 == 0) {
    $string .= " even";
  } else {
    $string .= " odd";
  }

  if($count % 3 == 0) {
    $string .= " three-last";
  } elseif(($count - 1) % 3 == 0) {
    $string .= " three-first";
  }

  if($count % 4 == 0) {
    $string .= " four-last";
  } elseif(($count - 1) % 4 == 0) {
    $string .= " four-first";
  }

  return $string;

}

function two_columns_flex($cells, $count) {
  $cell_count = count($cells);
  if($cell_count % 2 == 0) {
    return two_columns($count);
  } elseif(($cell_count - 1) % 2 == 0) {
    if($count == $cell_count) {
      return "twelvecol first";
    } else {
      return two_columns($count);
    }
  } else {
    return "error";
  }
}

function three_columns_flex($cells, $count) {
  $cell_count = count($cells);
  if($cell_count % 3 == 0) {
    return three_columns($count);
  } elseif(($cell_count + 1) % 3 == 0) {
    if($count == $cell_count || $count == ($cell_count - 1)) {
      if(($count - 1) % 3 == 0) {
        return "sixcol first";
      } else {
        return "sixcol last";
      }
    } else {
      return three_columns($count);
    }
  } elseif(($cell_count - 1) % 3 == 0) {
    if($count == $cell_count) {
      return "twelvecol first";
    } else {
      return three_columns($count);
    }
  } else {
    return "error";
  }
}

function four_columns_flex($cells, $count) {
  $cell_count = count($cells);
  if($cell_count % 4 == 0) {
    return four_columns($count);
  } elseif(($cell_count + 1) % 4 == 0) {
    if($count == $cell_count ||
       $count == ($cell_count - 1) ||
       $count == ($cell_count - 2)) {
      if(($count - 1) % 4 == 0) {
        return "fourcol first";
      } elseif(($count - 2) % 4 == 0) {
        return "fourcol";
      } else {
        return "fourcol last";
      }
    } else {
      return four_columns($count);
    }
  } elseif(($cell_count + 2) % 4 == 0) {
    if($count == $cell_count || $count == ($cell_count - 1)) {
      if(($count - 1) % 4 == 0) {
        return "sixcol first";
      } else {
        return "sixcol last";
      }
    } else {
      return four_columns($count);
    }
  } elseif(($cell_count - 1) % 4 == 0) {
    if($count == $cell_count) {
      return "twelvecol first";
    } else {
      return four_columns($count);
    }
  } else {
    return "error";
  }
}

function five_columns_flex($cells, $count) {
  $cell_count = count($cells);
  if($cell_count % 5 == 0) {
    return five_columns($count);
  } elseif(($cell_count + 1) % 5 == 0) {
    if($count == $cell_count ||
       $count == ($cell_count - 1) ||
       $count == ($cell_count - 2) ||
       $count == ($cell_count - 3)) {
      if(($count - 1) % 5 == 0) {
        return "threecol first";
      } elseif(($count - 2) % 5 == 0 ||
               ($count - 3) % 5 == 0) {
        return "threecol";
      } else {
        return "threecol last";
      }
    } else {
      return five_columns($count);
    }
  } elseif(($cell_count + 2) % 5 == 0) {
    if($count == $cell_count ||
       $count == ($cell_count - 1) ||
       $count == ($cell_count - 2)) {
      if(($count - 1) % 4 == 0) {
        return "fourcol first";
      } elseif(($count - 2) % 4 == 0) {
        return "fourcol";
      } else {
        return "fourcol last";
      }
    } else {
      return five_columns($count);
    }
  } elseif(($cell_count + 3) % 5 == 0) {
    if($count == $cell_count ||
       $count == ($cell_count - 1)) {
      if(($count - 1) % 5 == 0) {
        return "sixcol first";
      } else {
        return "sixcol last";
      }
    } else {
      return five_columns($count);
    }
  } elseif(($cell_count - 1) % 5 == 0) {
    if($count == $cell_count) {
      return "twelvecol first";
    } else {
      return five_columns($count);
    }
  } else {
    return "error";
  }
}

function six_columns_flex($cells, $count) {
  $cell_count = count($cells);
  if($cell_count % 6 == 0) {
    return six_columns($count);
  } elseif(($cell_count + 1) % 6 == 0) {
    if($count == $cell_count ||
       $count == ($cell_count - 1) ||
       $count == ($cell_count - 2) ||
       $count == ($cell_count - 3) ||
       $count == ($cell_count - 4)) {
      if(($count - 1) % 6 == 0) {
        return "twoptfourcol first";
      } elseif(($count - 2) % 5 == 0 ||
               ($count - 3) % 5 == 0 ||
               ($count - 4) % 5 == 0) {
        return "twoptfourcol";
      } else {
        return "twoptfourcol last";
      }
    } else {
      return six_columns($count);
    }
  } elseif(($cell_count + 2) % 6 == 0) {
    if($count == $cell_count ||
       $count == ($cell_count - 1) ||
       $count == ($cell_count - 2) ||
       $count == ($cell_count - 3)) {
      if(($count - 1) % 6 == 0) {
        return "threecol first";
      } elseif(($count - 2) % 6 == 0 ||
               ($count - 3) % 6 == 0) {
        return "threecol";
      } else {
        return "threecol last";
      }
    } else {
      return six_columns($count);
    }
  } elseif(($cell_count + 3) % 6 == 0) {
    if($count == $cell_count ||
       $count == ($cell_count - 1) ||
       $count == ($cell_count - 2)) {
      if(($count - 1) % 6 == 0) {
        return "fourcol first";
      } elseif(($count - 2) % 6 == 0) {
        return "fourcol";
      } else {
        return "fourcol last";
      }
    } else {
      return six_columns($count);
    }
  } elseif(($cell_count + 4) % 6 == 0) {
    if($count == $cell_count ||
       $count == ($cell_count - 1)) {
      if(($count - 1) % 6 == 0) {
        return "sixcol first";
      } else {
        return "sixcol last";
      }
    } else {
      return six_columns($count);
    }
  } elseif(($cell_count - 1) % 6 == 0) {
    if($count == $cell_count) {
      return "twelvecol first";
    } else {
      return six_columns($count);
    }
  } else {
    return "error";
  }
}

?>
