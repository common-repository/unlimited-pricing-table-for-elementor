<?php

namespace UPTE_Table\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * Pricing table style Two
 *
 * @since 1.0.0
 */
class Pricing_Table_Two extends Widget_Base {
    
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
		return 'upte-pricing-two';
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
		return __( 'Pricing table Tab', 'unlimited-pricing-table-for-elementor' );
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
		return [ 'basic' ];
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
                    'default' => 'yes'
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
                    'default' => 'Annually <span>25% Off</span>',
                    'dynamic' => [
                        'active' => true,
                    ],
                    'description' => 'To enable sub text use span tag'
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
                'title',
                [
                    'label' => esc_html__( 'Package', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'List Title' , 'unlimited-pricing-table-for-elementor' ),
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'second_price_switch',
                [
                    'label' => esc_html__( 'Show in Annual', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'unlimited-pricing-table-for-elementor' ),
                    'label_off' => esc_html__( 'Hide', 'unlimited-pricing-table-for-elementor' ),
                    'return_value' => 'yes',
                    'default' => '',
                ]
            );
            $repeater->add_control(
                'prim_price',
                [
                    'label' => esc_html__( 'Price', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 10,
                    'condition' => [ 'second_price_switch' => '']
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

            $this->add_control(
                'tbl_background',
                [
                    'label' => esc_html__( 'Background', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-price-wrap' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'ai_pricing_border',
                    'selector' => '{{WRAPPER}} .ai-price-wrap',
                ]
            );
            $this->add_responsive_control(
                'style_pricing_box',
                [
                    'label' => esc_html__( 'Padding', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .ai-price-wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'tab_styles',
			[
				'label' => esc_html__( 'Tab', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'inf_title',
                    'selector' => '{{WRAPPER}} .pricing-wrap .pricing-info h1',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'types' => [ 'classic', 'gradient' ],
                    'selector' => '{{WRAPPER}} .upte-tabs',
                ]
            );
            $this->add_control(
                'active_bg',
                [
                    'label' => esc_html__( 'Active Item', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .upte-tab.upte-active' => 'background-color: {{VALUE}}',
                        '{{WRAPPER}} .upte-tab span > span' => 'border-color: {{VALUE}}'
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'tabs_border',
                    'selector' => '{{WRAPPER}} .upte-tabs',
                ]
            );
            $this->add_responsive_control(
                'tab_gap',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Gap', 'unlimited-pricing-table-for-elementor' ),
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                        ],
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
                        '{{WRAPPER}} .upte-tabs' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
			'typo_section',
			[
				'label' => esc_html__( 'Heading', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'pricing_info',
                    'selector' => '{{WRAPPER}} .pricing-wrap .pricing-info h1',
                ]
            );
            $this->start_controls_tabs(
                'style_tabs'
            );

                // Normal style
                $this->start_controls_tab(
                    'pack_normal_tab',
                    [
                        'label' => esc_html__( 'Normal', 'unlimited-pricing-table-for-elementor' ),
                    ]
                );
                $this->add_control(
                    'pack_color',
                    [
                        'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .ai-price-content mark' => 'color: {{VALUE}}'
                        ],
                    ]
                );
                $this->add_control(
                    'pack_bg_color',
                    [
                        'label' => esc_html__( 'Background', 'unlimited-pricing-table-for-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .ai-price-content mark' => 'background-color: {{VALUE}}'
                        ],
                    ]
                );
                $this->end_controls_tab();

                // hover style
                $this->start_controls_tab(
                    'pack_hover_tab',
                    [
                        'label' => esc_html__( 'Normal', 'unlimited-pricing-table-for-elementor' ),
                    ]
                );
                $this->add_control(
                    'pack_color_hover',
                    [
                        'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .ai-price-content:hover mark' => 'color: {{VALUE}}'
                        ],
                    ]
                );
                $this->add_control(
                    'pack_bg_color_hover',
                    [
                        'label' => esc_html__( 'Background', 'unlimited-pricing-table-for-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .ai-price-content:hover mark' => 'background-color: {{VALUE}}'
                        ],
                    ]
                );
                $this->end_controls_tab();
            
            $this->end_controls_tabs();

            
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'pack_border',
                    'selector' => '{{WRAPPER}} .upte-tabs',
                ]
            );
            $this->add_responsive_control(
                'pack_gap',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Gap', 'unlimited-pricing-table-for-elementor' ),
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                        ],
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
                        '{{WRAPPER}} .ai-price-content mark' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            
        $this->end_controls_section();
        //End control for Typography tab

        $this->start_controls_section(
			'pricing',
			[
				'label' => esc_html__( 'Pricing', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
            // Price color 
            $this->add_control(
                'price_color',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-price-content ._price_are' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'price_typo',
                    'selector' => '{{WRAPPER}} ._price_are',
                ]
            );


            $this->add_control(
                'Price_Period',
                [
                    'label' => esc_html__( 'Price Period', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            // Price color 
            $this->add_control(
                'price_per_color',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-price-content ._price_are span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'price_per_typo',
                    'selector' => '{{WRAPPER}} ._price_are span',
                ]
            );
            $this->add_responsive_control(
                'after_price_gap',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Gap', 'unlimited-pricing-table-for-elementor' ),
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                        ],
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
                        '{{WRAPPER}} .ai-price-content ._price_are' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
        
        $this->end_controls_section();
        //End control for Typography tab
    

        $this->start_controls_section(
			'features_desc',
			[
				'label' => esc_html__( 'Description', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_control(
                'fdesc_color',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ai-price-wrap .ai-price-content ul li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'fdesc_typo',
                    'selector' => '{{WRAPPER}}  .ai-price-wrap .ai-price-content ul li',
                ]
            );
            $this->add_control(
                'fdesc_icon_control',
                [
                    'label' => esc_html__( 'Show Icon', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Hide', 'unlimited-pricing-table-for-elementor' ),
                    'label_off' => esc_html__( 'Show', 'unlimited-pricing-table-for-elementor' ),
                    'return_value' => 'none',
                    'selectors' => [
                        '{{WRAPPER}}  .pricing-contents-two ul li:before' => 'display: {{VALUE}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'fdesc_icon_size',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Icon Size', 'unlimited-pricing-table-for-elementor' ),
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                        ],
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
                        '{{WRAPPER}}  .pricing-contents-two ul li:before' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [ 'fdesc_icon_control' => '']
                ]
            );
            $this->add_responsive_control(
                'fdesc_gap',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Gap', 'unlimited-pricing-table-for-elementor' ),
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                        ],
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
                        '{{WRAPPER}}  .ai-price-wrap .pricing-contents-two' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();
        //End control for Typography tab


        $this->start_controls_section(
			'button_section',
			[
				'label' => esc_html__( 'Button', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
            $this->start_controls_tabs(
                'btn_hover_tabs'
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
                            '{{WRAPPER}} .ai-price-btn' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'btn_bg',
                    [
                        'label' => esc_html__( 'Background', 'unlimited-pricing-table-for-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .ai-price-btn' => 'background: {{VALUE}}',
                        ],
                    ]
                );
            $this->end_controls_tab();

            $this->start_controls_tab(
                'btn_hover_tab',
                [
                    'label' => esc_html__( 'Normal', 'unlimited-pricing-table-for-elementor' ),
                ]
            );
                $this->add_control(
                    'btn_txt_color_hover',
                    [
                        'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .ai-price-btn:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'btn_bg_hover',
                    [
                        'label' => esc_html__( 'Background', 'unlimited-pricing-table-for-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .ai-price-btn:hover' => 'background: {{VALUE}}',
                        ],
                    ]
                );
            $this->end_controls_tab();
            
            $this->end_controls_tabs();
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button',
                    'selector' => '{{WRAPPER}} .ai-price-btn',
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
                        '{{WRAPPER}} .ai-price-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
		$settings = $this->get_settings_for_display();
        $allowd_tags    = UPTE_Init()->UPTE_allowed_tags();

        ?>

            <?php if( $settings['annual_toggle'] == 'yes'): ?>
                <!-- pricing tabs -->
                <div class="upte-container txt-center">
                    <ul class="upte-tabs">
                        <li class="upte-tab">
                            <span><?php echo wp_kses( $settings['toggle_text_left'], $allowd_tags ) ?></span>
                        </li>
                        <li class="upte-tab">
                            <span><?php echo wp_kses( $settings['toggle_text_right'], $allowd_tags ) ?></span>
                        </li>
                    </ul>
                </div>
            <?php endif ?>

            <div class="upte-tab_content">
                <div class="upte-tab_item">
                    <div class="upte-row">
                    <?php foreach($settings['list'] as $item):

                        if($item['second_price_switch'] == 'no' || empty($item['second_price_switch'])):
                            ?>
                            <!-- Price -->
                            <div class="column column-4">
                                    <div class="ai-price-wrap">
                                        <div class="ai-price-content">
                                            <?php 
                                                if(!empty($item['title'])){
                                                    echo '<mark>'. esc_html( $item['title'] ) .'</mark>';
                                                }

                                                $currency   = ($settings['currency'] != '') ? $settings['currency'] : false;
                                                $period     = ($settings['period'] != '') ? '<span>'.$settings['period'].'</span>' : false;
                                                $price      = ($item['prim_price'] != '') ? $item['prim_price'] : false;

                                                printf('<h2 class="_price_are">%1$s%2$s%3$s</h2>', wp_kses( $currency, $allowd_tags ), wp_kses( $price, $allowd_tags ), wp_kses( $period, $allowd_tags ));
                                                
                                                // contetnts
                                                $list_content = $this->parse_text_editor( $item['list_content'] );
                                                echo '<div class="pricing-contents-two">'. wp_kses( $list_content, true ) .'</div>';
                                            ?>
                                        </div>
                                        <?php 
                                            if( !empty($item['btn']) && $item['btn_link']['url']){
                                                $this->add_link_attributes( 'btn_link', $item['btn_link'], true );
                                                echo '<div class="ai-price-btn-wrap">';
                                                echo '<a class="ai-price-btn" '.  wp_kses( $this->get_render_attribute_string( 'btn_link' ), true ) .'>'.esc_html($item['btn']).'</a>';
                                                echo '</div>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            <!-- Price End -->
                            <?php
                        endif;
                    ?>
                    
                    <?php endforeach; ?>
                </div>
                </div>

                <div class="upte-tab_item">
                    <div class="upte-row">
                    <?php foreach($settings['list'] as $item): ?>
                    <?php 
                        if($item['second_price_switch'] == 'yes'):
                            ?>
                            <!-- Price -->
                            <div class="column column-4">
                                    <div class="ai-price-wrap">
                                    <div class="ai-price-content">
                                            <?php 
                                                if(!empty($item['title'])){
                                                    echo '<mark>'. esc_html( $item['title'] ) .'</mark>';
                                                }

                                                $currency   = ($settings['currency'] != '') ? $settings['currency'] : false;
                                                $period = ($settings['period_sec'] != '') ? '<span>'. $settings['period_sec'] .'</span>' : false;
                                                $price      = ($item['sec_price'] != '') ? $item['sec_price'] : $item['prim_price'];

                                                printf('<h2 class="_price_are">%1$s%2$s%3$s</h2>', wp_kses( $currency, $allowd_tags ), wp_kses( $price, $allowd_tags ), wp_kses( $period, $allowd_tags ));
                                                
                                                // contetnts
                                                $list_content = $this->parse_text_editor( $item['list_content'] );
                                                echo '<div class="pricing-contents-two">'. wp_kses($list_content, true) .'</div>';
                                            ?>
                                        </div>
                                        <?php 
                                            if( !empty($item['btn']) && $item['btn_link']['url']){
                                                $this->add_link_attributes( 'btn_link', $item['btn_link'], true );
                                                echo '<div class="ai-price-btn-wrap">';
                                                echo '<a class="ai-price-btn" '.  wp_kses( $this->get_render_attribute_string( 'btn_link' ), true ) .'>'.esc_html($item['btn']).'</a>';
                                                echo '</div>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            <!-- Price End -->
                            <?php
                        endif;
                    ?>
                    
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
		<?php
    }
	
}