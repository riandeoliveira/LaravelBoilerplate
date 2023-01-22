<?php

declare(strict_types=1);

use PhpCsFixer\{Config, Finder};

$finder = Finder::create()
  ->in(__DIR__)
  ->name('*.php')
  ->notName('*.blade.php')
  ->notPath('bootstrap')
  ->notPath('storage')
  ->notPath('vendor');

$config = new Config();

return $config
  ->setRiskyAllowed(true)
  ->setIndent('  ')
  ->setFinder($finder)
  ->setRules([
    'align_multiline_comment' => [
      'comment_type' => 'all_multiline',
    ],
    'array_indentation' => true,
    'array_syntax' => ['syntax' => 'short'],
    'assign_null_coalescing_to_coalesce_equal' => true,
    'backtick_to_shell_exec' => true,
    'binary_operator_spaces' => [
      'default' => 'single_space',
    ],
    'blank_line_after_namespace' => true,
    'blank_line_after_opening_tag' => true,
    'blank_line_before_statement' => [
      'statements' => [
        'break',
        'continue',
        'return',
        'throw',
      ],
    ],
    'braces' => [
      'allow_single_line_anonymous_class_with_empty_body' => true,
      'allow_single_line_closure' => true,
      'position_after_anonymous_constructs' => 'same',
      'position_after_control_structures' => 'same',
      'position_after_functions_and_oop_constructs' => 'same',
    ],
    'cast_spaces' => [
      'space' => 'single',
    ],
    'class_definition' => [
      'inline_constructor_arguments' => true,
      'multi_line_extends_each_single_line' => true,
      'single_item_single_line' => true,
      'single_line' => true,
      'space_before_parenthesis' => true,
    ],
    'class_reference_name_casing' => true,
    'clean_namespace' => true,
    'combine_consecutive_issets' => true,
    'combine_consecutive_unsets' => true,
    'combine_nested_dirname' => true,
    'compact_nullable_typehint' => true,
    'concat_space' => [
      'spacing' => 'none',
    ],
    'constant_case' => [
      'case' => 'lower',
    ],
    'control_structure_braces' => true,
    'control_structure_continuation_position' => [
      'position' => 'same_line',
    ],
    'curly_braces_position' => [
      'allow_single_line_anonymous_functions' => true,
      'allow_single_line_empty_anonymous_classes' => true,
      'anonymous_classes_opening_brace' => 'same_line',
      'anonymous_functions_opening_brace' => 'same_line',
      'classes_opening_brace' => 'same_line',
      'control_structures_opening_brace' => 'same_line',
      'functions_opening_brace' => 'same_line',
    ],
    'declare_equal_normalize' => [
      'space' => 'none',
    ],
    'declare_parentheses' => true,
    'declare_strict_types' => true,
    'dir_constant' => true,
    'empty_loop_body' => [
      'style' => 'braces',
    ],
    'empty_loop_condition' => [
      'style' => 'while',
    ],
    'encoding' => true,
    'explicit_string_variable' => true,
    'full_opening_tag' => true,
    'fully_qualified_strict_types' => true,
    'function_declaration' => [
      'closure_fn_spacing' => 'none',
      'closure_function_spacing' => 'none',
      'trailing_comma_single_line' => false,
    ],
    'function_typehint_space' => true,
    'get_class_to_class_keyword' => true,
    'global_namespace_import' => [
      'import_classes' => true,
      'import_constants' => true,
      'import_functions' => true,
    ],
    'group_import' => true,
    'include' => true,
    'integer_literal_case' => true,
    'is_null' => true,
    'lambda_not_used_import' => true,
    'linebreak_after_opening_tag' => true,
    'list_syntax' => [
      'syntax' => 'short',
    ],
    'logical_operators' => true,
    'lowercase_cast' => true,
    'lowercase_keywords' => true,
    'lowercase_static_reference' => true,
    'magic_constant_casing' => true,
    'magic_method_casing' => true,
    'method_argument_space' => [
      'after_heredoc' => true,
      'keep_multiple_spaces_after_comma' => false,
      'on_multiline' => 'ensure_single_line',
    ],
    'method_chaining_indentation' => true,
    'modernize_types_casting' => true,
    'multiline_comment_opening_closing' => true,
    'multiline_whitespace_before_semicolons' => [
      'strategy' => 'no_multi_line',
    ],
    'native_function_casing' => true,
    'native_function_type_declaration_casing' => true,
    'new_with_braces' => [
      'anonymous_class' => true,
      'named_class' => true,
    ],
    'no_blank_lines_after_class_opening' => true,
    'no_blank_lines_after_phpdoc' => true,
    'no_closing_tag' => true,
    'no_empty_comment' => true,
    'no_empty_phpdoc' => true,
    'no_empty_statement' => true,
    'no_extra_blank_lines' => [
      'tokens' => [
        'attribute',
        'break',
        'case',
        'continue',
        'curly_brace_block',
        'default',
        'extra',
        'parenthesis_brace_block',
        'return',
        'square_brace_block',
        'switch',
        'throw',
        'use',
        'use_trait',
      ],
    ],
    'no_leading_import_slash' => true,
    'no_leading_namespace_whitespace' => true,
    'no_multiline_whitespace_around_double_arrow' => true,
    'no_multiple_statements_per_line' => true,
    'no_php4_constructor' => true,
    'no_short_bool_cast' => true,
    'no_singleline_whitespace_before_semicolons' => true,
    'no_space_around_double_colon' => true,
    'no_spaces_after_function_name' => true,
    'no_spaces_around_offset' => [
      'positions' => ['inside', 'outside'],
    ],
    'no_spaces_inside_parenthesis' => true,
    'no_trailing_comma_in_singleline' => [
      'elements' => [
        'arguments',
        'array_destructuring',
        'array',
        'group_import',
      ],
    ],
    'no_trailing_whitespace' => true,
    'no_trailing_whitespace_in_comment' => true,
    'no_unneeded_control_parentheses' => [
      'statements' => [
        'break',
        'clone',
        'continue',
        'echo_print',
        'negative_instanceof',
        'others',
        'return',
        'switch_case',
        'yield',
        'yield_from',
      ],
    ],
    'no_unneeded_curly_braces' => true,
    'no_unneeded_import_alias' => true,
    'no_unset_cast' => true,
    'no_unset_on_property' => true,
    'no_unused_imports' => true,
    'no_useless_concat_operator' => true,
    'no_useless_else' => true,
    'no_useless_return' => true,
    'no_whitespace_before_comma_in_array' => true,
    'no_whitespace_in_blank_line' => true,
    'normalize_index_brace' => true,
    'ordered_class_elements' => [
      'sort_algorithm' => 'alpha',
    ],
    'ordered_imports' => [
      'imports_order' => [
        'const',
        'class',
        'function',
      ],
      'sort_algorithm' => 'alpha',
    ],
    'ordered_traits' => true,
    'return_assignment' => true,
    'return_type_declaration' => [
      'space_before' => 'none',
    ],
    'self_accessor' => true,
    'semicolon_after_instruction' => true,
    'set_type_to_cast' => true,
    'short_scalar_cast' => true,
    'simple_to_complex_string_variable' => true,
    'simplified_null_return' => true,
    'single_blank_line_at_eof' => true,
    'single_blank_line_before_namespace' => true,
    'single_class_element_per_statement' => [
      'elements' => [
        'const',
        'property',
      ],
    ],
    'single_line_after_imports' => true,
    'single_line_comment_spacing' => true,
    'single_line_throw' => true,
    'single_quote' => true,
    'single_space_after_construct' => true,
    'standardize_not_equals' => true,
    'statement_indentation' => true,
    'strict_comparison' => true,
    'switch_case_semicolon_to_colon' => true,
    'switch_case_space' => true,
    'switch_continue_to_break' => true,
    'ternary_operator_spaces' => true,
    'ternary_to_null_coalescing' => true,
    'trailing_comma_in_multiline' => [
      'elements' => [
        'arguments',
        'arrays',
        'match',
        'parameters',
      ],
    ],
    'trim_array_spaces' => true,
    'types_spaces' => true,
    'unary_operator_spaces' => true,
    'visibility_required' => [
      'elements' => [
        'const',
        'property',
        'method',
      ],
    ],
    'void_return' => true,
    'whitespace_after_comma_in_array' => [
      'ensure_single_space' => true,
    ],
  ]);
