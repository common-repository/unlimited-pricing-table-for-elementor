<?php

namespace UPTE_Table\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * Pricing table style one
 *
 * @since 1.0.0
 */
class Pricing_Table_One extends Widget_Base {
    
	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'upte-pricing-one';
	}
    
	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Pricing table Toggle', 'unlimited-pricing-table-for-elementor' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-price-table';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'unlimited-pricing-table-for-elementor' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'unlimited-pricing-table-for-elementor' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {


        /**
         * 
         * Start control for content tab
         */
        $this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Contents', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

            $this->add_control(
                'annual_toggle',
                [
                    'label' => esc_html__( 'Show Annual toggle', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'unlimited-pricing-table-for-elementor' ),
                    'label_off' => esc_html__( 'Hide', 'unlimited-pricing-table-for-elementor' ),
                    'return_value' => 'yes',
                    'default' => 'no'
                ]
            );
            $this->add_control(
                'toggle_text_left',
                [
                    'label' => esc_html__( 'Left title', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Monthly' , 'unlimited-pricing-table-for-elementor' ),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );
            $this->add_control(
                'toggle_text_right',
                [
                    'label' => esc_html__( 'Right title', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Annually' , 'unlimited-pricing-table-for-elementor' ),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );
            $this->add_control(
                'currency',
                [
                    'label' => esc_html__( 'Currency', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( '$' , 'unlimited-pricing-table-for-elementor' ),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );
            $this->add_control(
                'period',
                [
                    'label' => esc_html__( 'Period', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( '/Per Month' , 'unlimited-pricing-table-for-elementor' ),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );
            $this->add_control(
                'period_sec',
                [
                    'label' => esc_html__( 'Second Period', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( '/Per Year' , 'unlimited-pricing-table-for-elementor' ),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );
        $this->end_controls_section();


        /**
         * 
         * Start control for content tab
         */
        $this->start_controls_section(
			'pricing_section',
			[
				'label' => esc_html__( 'Pricings', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'featured',
                [
                    'label' => esc_html__( 'Featured', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'unlimited-pricing-table-for-elementor' ),
                    'label_off' => esc_html__( 'Hide', 'unlimited-pricing-table-for-elementor' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );
            $repeater->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'List Title' , 'unlimited-pricing-table-for-elementor' ),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'pack_desc',
                [
                    'label' => esc_html__( 'Description', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => esc_html__( 'Perfect to get started' , 'unlimited-pricing-table-for-elementor' ),
                ]
            );
            $repeater->add_control(
                'second_price_switch',
                [
                    'label' => esc_html__( 'Enable Secondary price', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'unlimited-pricing-table-for-elementor' ),
                    'label_off' => esc_html__( 'Hide', 'unlimited-pricing-table-for-elementor' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );
            $repeater->add_control(
                'prim_price',
                [
                    'label' => esc_html__( 'Price', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 10,
                ]
            );
            $repeater->add_control(
                'sec_price',
                [
                    'label' => esc_html__( 'Secondary Price', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 99,
                    'condition' => ['second_price_switch' => 'yes']
                ]
            );
            $repeater->add_control(
                'trial_btn',
                [
                    'label' => esc_html__( 'Trial', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Start 15 days trial' , 'unlimited-pricing-table-for-elementor' ),
                ]
                );
            $repeater->add_control(
                'trial_btn_link',
                [
                    'label' => esc_html__( 'Link', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'default' => [
                        'url' => '#',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'list_content',
                [
                    'label' => esc_html__( 'Content', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => esc_html__( 'Add pricing lists content' , 'unlimited-pricing-table-for-elementor' ),
                    'show_label' => false,
                ]
            );

            $repeater->add_control(
                'btn',
                [
                    'label' => esc_html__( 'Button', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Start 15 days trial' , 'unlimited-pricing-table-for-elementor' ),
                    'label_block' => true,
                ]
                );
            $repeater->add_control(
                'btn_link',
                [
                    'label' => esc_html__( 'Link', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'default' => [
                        'url' => '#',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                ]
            );

            $this->add_control(
                'list',
                [
                    'label' => esc_html__( 'Pricing List', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'title' => esc_html__( 'Table #1', 'unlimited-pricing-table-for-elementor' )
                        ],
                        [
                            'title' => esc_html__( 'Table #2', 'unlimited-pricing-table-for-elementor' )
                        ],
                    ],
                    'title_field' => '{{{ title }}}',
                ]
            );

        $this->end_controls_section();
        //End control for content tab


        /**
         * 
         * Start control for Style
         */
        $this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->start_controls_tabs(
                'pricing_style_tab'
            );
            
            $this->start_controls_tab(
                'pricing_normal_tab',
                [
                    'label' => esc_html__( 'Normal', 'unlimited-pricing-table-for-elementor' ),
                ]
            );
                $this->add_control(
                    'featured_bgcolor',
                    [
                        'label' => esc_html__( 'Featured Color', 'unlimited-pricing-table-for-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pricing-wrap.active' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'background',
                    [
                        'label' => esc_html__( 'Background', 'unlimited-pricing-table-for-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pricing-wrap' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );
            $this->end_controls_tab();

            $this->start_controls_tab(
                'pricing_hover_tab',
                [
                    'label' => esc_html__( 'Hover', 'unlimited-pricing-table-for-elementor' ),
                ]
            );
                $this->add_control(
                    'featured_bgcolor_hover',
                    [
                        'label' => esc_html__( 'Featured Color', 'unlimited-pricing-table-for-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pricing-wrap.active:hover' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'pricing_background_hover',
                    [
                        'label' => esc_html__( 'Background', 'unlimited-pricing-table-for-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pricing-wrap:hover' => 'background-color: {{VALUE}}',
                        ],
                    ]
                );
            $this->end_controls_tab();
            
            $this->end_controls_tabs();
            
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'selector' => '{{WRAPPER}} .pricing-wrap',
                ]
            );


        $this->end_controls_section();
        //End control for content tab


        /**
         * 
         * Start control for Style
         */
        $this->start_controls_section(
			'toggle_styles',
			[
				'label' => esc_html__( 'Toggle', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            // typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'toggle_typo',
                    'selector' => '{{WRAPPER}} .upte-toggle-btn span',
                ]
            );
            // swich bg color
            $this->add_control(
                'toggle_slider',
                [
                    'label' => esc_html__( 'Background', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pute-slider' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            // swich  color
            $this->add_control(
                'toggle_color',
                [
                    'label' => esc_html__( 'Switch Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pute-slider:before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            // swich text color
            $this->add_control(
                'toggle_txt_color',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .upte-toggle-btn span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_responsive_control(
                'toggle_switch_gap',
                [
                    'label' => esc_html__( 'Gap', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .upte-toggle-btn' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();
        //End control for content tab

        /**
         * 
         * Start control for Style
         */
        $this->start_controls_section(
			'lablel_style',
			[
				'label' => esc_html__( 'Label', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            // label typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'pack_label_typo',
                    'selector' => '{{WRAPPER}} .pricing-info .package_label',
                ]
            );

            // label color
            $this->add_control(
                'label_color',
                [
                    'label' => esc_html__( 'Background', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-info .package_label' => 'color: {{VALUE}}',
                    ],
                ]
            );


            // label gap
            $this->add_responsive_control(
                'label_gap',
                [
                    'label' => esc_html__( 'Gap', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 5,
                        ]
                    ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'desktop_default' => [
                        'size' => 30,
                        'unit' => 'px',
                    ],
                    'tablet_default' => [
                        'size' => 20,
                        'unit' => 'px',
                    ],
                    'mobile_default' => [
                        'size' => 10,
                        'unit' => 'px',
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .pricing-info .package_label' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'label_description',
                [
                    'label' => esc_html__( 'Description', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            // descrioption typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'pack_description',
                    'selector' => '{{WRAPPER}} .pricing-info .pack_description',
                ]
            );

            // label color
            $this->add_control(
                'desc_color',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-info .pack_description' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Description gap
            $this->add_responsive_control(
                'desc_gap',
                [
                    'label' => esc_html__( 'Gap', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100
                        ]
                    ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .pricing-info .pack_description' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();
        //End control for content tab

        /**
         * 
         * Start control for Style
         */
        $this->start_controls_section(
			'price_section',
			[
				'label' => esc_html__( 'Price', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            // descrioption typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'price_amount',
                    'selector' => '{{WRAPPER}} .pricing-info .pack_price',
                ]
            );

            // label color
            $this->add_control(
                'pack_price',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-info .pack_price' => 'color: {{VALUE}}',
                    ],
                ]
            );

            // Description gap
            $this->add_responsive_control(
                'pack_price_gap',
                [
                    'label' => esc_html__( 'Gap', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100
                        ]
                    ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .pricing-info .pack_price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            // pricing periods
            $this->add_control(
                'price_periods',
                [
                    'label' => esc_html__( 'Periods', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
        
            // descrioption typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'price_per_amount',
                    'selector' => '{{WRAPPER}} .pricing-info .pack_price sub',
                ]
            );

            // label color
            $this->add_control(
                'periods_color',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-info .pack_price sub' => 'color: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();
        //End control for content tab

        /**
         * 
         * Start control for Style
         */
        $this->start_controls_section(
			'features_style',
			[
				'label' => esc_html__( 'Features', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
            // descrioption typography
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'features_typ',
                    'selector' => '{{WRAPPER}} .pricing-info .pricing-contents',
                ]
            );

            // label color
            $this->add_control(
                'features_color',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-info .pricing-contents' => 'color: {{VALUE}}',
                    ],
                ]
            );

            
            $this->add_responsive_control(
                'pack_features_gap',
                [
                    'label' => esc_html__( 'Margin', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .pricing-info .pricing-contents' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
        $this->end_controls_section();
        //End control for content tab

        
        $this->start_controls_section(
			'button_section',
			[
				'label' => esc_html__( 'Button', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        $this->start_controls_tabs(
            'style_tabs'
        );
        
        $this->start_controls_tab(
            'btn_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'unlimited-pricing-table-for-elementor' ),
            ]
        );
            $this->add_control(
                'btn_txt_color',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn_bg',
                [
                    'label' => esc_html__( 'Background', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-btn' => 'background: {{VALUE}}',
                    ],
                ]
            );
        $this->end_controls_tab();
        $this->start_controls_tab(
            'btn_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'unlimited-pricing-table-for-elementor' ),
            ]
        );
            $this->add_control(
                'btn_txt_color_hover',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-btn:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn_bg_hover',
                [
                    'label' => esc_html__( 'Background', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-btn:hover' => 'background: {{VALUE}}',
                    ],
                ]
            );
        $this->end_controls_tab();
        
        $this->end_controls_tabs();

            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button',
                    'selector' => '{{WRAPPER}} .pricing-btn',
                ]
            );

            $this->add_responsive_control(
                'btn_padding',
                [
                    'label' => esc_html__( 'Padding', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .pricing-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            // Secondary button
            $this->add_control(
                'secondary_btn',
                [
                    'label' => esc_html__( 'Secondary Button', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sec_btn_txt_color',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .trial-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'sec_btn_bg',
                [
                    'label' => esc_html__( 'Background', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .trial-btn' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'trial_sec_btn',
                    'selector' => '{{WRAPPER}} .trial-btn',
                ]
            );

            $this->add_responsive_control(
                'sec_btn_padding',
                [
                    'label' => esc_html__( 'Padding', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .trial-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();
        //End control for Typography tab

	}

    	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings       = $this->get_settings_for_display();
        $allowd_tags    = UPTE_Init()->UPTE_allowed_tags();
    ?>

            <?php if( $settings['annual_toggle'] == 'yes'): ?>
                <div class="upte-toggle-btn txt-center">
                    <span style="margin: 0.8em;"><?php echo esc_html( $settings['toggle_text_left'] ) ?></span>
                    <label class="upte-switch">
                        <input type="checkbox" id="checbox"/>
                        <span class="pute-slider round"></span>
                    </label>
                    <span style="margin: 0.8em;"><?php echo esc_html( $settings['toggle_text_right'] ) ?></span>
                </div>
            <?php endif; ?>

            <div class="upte-container">
                <div class="upte-row">
                    <?php foreach($settings['list'] as $item): ?>
                        <?php $is_active = ($item['featured'] == 'yes') ? 'active':false; ?>
                        <div class="column column-4">
                            <div class="pricing-wrap d-flex flex-column overflow-hidden justify-content-between <?php echo esc_attr( $is_active ) ?>">
                            <div class="pricing-info">
                                <?php
                                 $currency   = ($settings['currency'] != '') ? $settings['currency'] : false;
                                 $period     = ($settings['period'] != '') ? '<sub>'.$settings['period'].'</sub>' : false;
                                 $period_sec = ($settings['period_sec'] != '') ? '<sub>'.$settings['period_sec'].'</sub>' : false;
                                 $price      = ($item['prim_price'] != '') ? $item['prim_price'] : false;
                                 $price_sec  = ($item['sec_price'] != '') ? $item['sec_price'] : false;
                                 $list_content = $this->parse_text_editor( $item['list_content'] );

                                    if(!empty($item['title'])){
                                        echo '<h3 class="package_label">'. wp_kses( $item['title'], $allowd_tags ) .'</h3>';
                                    }
                                    if(!empty($item['pack_desc'])){
                                        echo '<p class="pack_description">'. wp_kses( $item['pack_desc'], $allowd_tags ) .'</p>';
                                    }

                                    if( $item['second_price_switch'] == 'yes' ){
                                        printf('<h4 class="upte_price_2 pack_price">%1$s%2$s%3$s</h4>', wp_kses( $currency, $allowd_tags ), wp_kses( $price, $allowd_tags ), wp_kses( $period, $allowd_tags ) );
                                        printf('<h4 class="upte_price_1 pack_price">%1$s%2$s%3$s</h4>', wp_kses( $currency, $allowd_tags ), wp_kses( $price_sec, $allowd_tags ), wp_kses( $period_sec, $allowd_tags ));
                                    }else{
                                        printf('<h4 class="pack_price">%1$s%2$s%3$s</h4>', wp_kses( $currency, $allowd_tags ), wp_kses( $price, $allowd_tags ), wp_kses( $period, $allowd_tags ) );
                                    }

                                    if( !empty($item['trial_btn']) && $item['trial_btn_link']['url']){
                                        $this->add_link_attributes( 'trial_links', $item['trial_btn_link'], true );
                                        echo '<a class="trial-btn txt-center d-inline-block test_ccc" '. wp_kses($this->get_render_attribute_string( 'trial_links' ), true) .'>'.esc_html($item['trial_btn']).'</a>';
                                    }

                                    echo '<div class="pricing-contents">'. wp_kses($list_content, $allowd_tags) .'</div>';

                                    ?>
                            </div>

                            <?php 
                                if( !empty($item['btn']) && $item['btn_link']['url']){
                                    $this->add_link_attributes( 'btn_link', $item['btn_link'], true );
                                    ?>
                                        <div class="pricing-btn-wrap">
                                            <a class="pricing-btn"  <?php echo wp_kses($this->get_render_attribute_string( 'btn_link' ), true);  ?>><?php echo esc_html($item['btn']) ?></a>
                                        </div>
                                    <?php
                                }
                            ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div> 
		<?php
    }
	
}