<?php

namespace UPTE_Table\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Widget_Base;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


/**
 * Pricing table style Three
 *
 * @since 1.0.0
 */
class Pricing_Table_Three extends Widget_Base {
    
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
		return 'upte-pricing-three';
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
		return __( 'Pricing table Single', 'unlimited-pricing-table-for-elementor' );
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
				'label' => esc_html__( 'Header', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

            $this->add_control(
                'ribon_control',
                [
                    'label' => esc_html__( 'Show Ribon', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'Show', 'unlimited-pricing-table-for-elementor' ),
                    'label_off' => esc_html__( 'Hide', 'unlimited-pricing-table-for-elementor' ),
                    'return_value' => 'yes',
                    'default' => 'no'
                ]
            );
            $this->add_control(
                'ribon_img',
                [
                    'label' => esc_html__( 'Choose Label', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                    'condition' => ['ribon_control' => 'yes']
                ]
            );
            $this->add_responsive_control(
                'ribon_img_top',
                [
                    'label' => esc_html__( 'top', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'range' => [
                        'px' => [

                            'max' => 1000,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => -8,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .upte_layout_three.is_icon:before' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => ['ribon_control' => 'yes']
                ]
            );
            $this->add_responsive_control(
                'ribon_img_left',
                [
                    'label' => esc_html__( 'top', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'range' => [
                        'px' => [

                            'max' => 1000,
                        ]
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => -8,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .upte_layout_three.is_icon:before' => 'left: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => ['ribon_control' => 'yes']
                ]
            );

            $this->add_control(
                'pack_title',
                [
                    'label' => esc_html__( 'Pack Title', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Basic Plan' , 'unlimited-pricing-table-for-elementor' ),
                    'dynamic' => [
                        'active' => true,
                    ],
                ]
            );

            // thumbnail
            $this->add_control(
                'pack_thumbnail',
                [
                    'label' => esc_html__( 'Thumbnail', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ]
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
				'label' => esc_html__( 'Pricing', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
                'prim_price',
                [
                    'label' => esc_html__( 'Price', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'default' => 10,
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
        $this->end_controls_section();


        /**
         * 
         * Start control for content tab
         */
        $this->start_controls_section(
			'features_section',
			[
				'label' => esc_html__( 'Features', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
            $this->add_control(
                'features_title',
                [
                    'label' => esc_html__( 'Features Title', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'The most affordable pricing plan' , 'unlimited-pricing-table-for-elementor' ),
                    'label_block' => true,
                ]
            );

            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'flist_title',
                [
                    'label' => esc_html__( 'Text', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'List Title' , 'unlimited-pricing-table-for-elementor' ),
                ]
            );
            $repeater->add_control(
                'flist_icon',
                [
                    'label' => esc_html__( 'Icon', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::ICONS
                ]
            );
            $repeater->add_control(
                'flist_icon_clr',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} i' => 'color: {{VALUE}}',
                        '{{WRAPPER}} {{CURRENT_ITEM}} svg' => 'fill: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'featur_lists',
                [
                    'label' => esc_html__( 'Pricing List', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'flist_title' => esc_html__( 'Real time crypto trading', 'unlimited-pricing-table-for-elementor' )
                        ],
                        [
                            'flist_title' => esc_html__( 'Android and iPhone mobile app', 'unlimited-pricing-table-for-elementor' )
                        ],
                        [
                            'flist_title' => esc_html__( 'Trading up to $100K per month', 'unlimited-pricing-table-for-elementor' )
                        ],
                    ],
                    'title_field' => '{{{ flist_title }}}',
                ]
            );

        $this->end_controls_section();
        //End control for content tab

        /**
         * 
         * Start control for Button section
         */
        $this->start_controls_section(
			'button_section',
			[
				'label' => esc_html__( 'Button', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
            $this->add_control(
                'btn_title',
                [
                    'label' => esc_html__( 'Title', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => esc_html__( 'Choose Plan', 'unlimited-pricing-table-for-elementor' ),
                    'placeholder' => esc_html__( 'Button name', 'unlimited-pricing-table-for-elementor' ),
                ]
            );
            $this->add_control(
                'btn_link',
                [
                    'label' => esc_html__( 'Link', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'options' => [ 'url', 'is_external', 'nofollow' ],
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                    'label_block' => true,
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
                        '{{WRAPPER}} .upte_layout_three' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => '_pricing_border',
                    'selector' => '{{WRAPPER}} .upte_layout_three ',
                ]
            );
            $this->add_responsive_control(
                'table_padding',
                [
                    'label' => esc_html__( 'Padding', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .upte_layout_three' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
			'header_styles',
			[
				'label' => esc_html__( 'Header', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'inf_title',
                    'selector' => '{{WRAPPER}} .upte_layout_three .price_pack_name',
                ]
            );

            $this->add_control(
                'pack_title_color',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .upte_layout_three .price_pack_name' => 'color: {{VALUE}}'
                    ],
                ]
            );

            $this->add_responsive_control(
                'thumbnail_width',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Width', 'unlimited-pricing-table-for-elementor' ),
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'size_units' => [ '%', 'px', 'em', 'rem', 'custom' ],
                    'selectors' => [
                        '{{WRAPPER}} .pack_thumb img' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'ribon_width',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Ribon Width', 'unlimited-pricing-table-for-elementor' ),
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .upte_layout_three.is_icon:before' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'ribon_height',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Ribon Height', 'unlimited-pricing-table-for-elementor' ),
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .upte_layout_three.is_icon:before' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'gap_after_title',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Title Gap', 'unlimited-pricing-table-for-elementor' ),
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .price_pack_name' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'gap_after_thumb',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Thumbnail Gap', 'unlimited-pricing-table-for-elementor' ),
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .pack_thumb' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
				'label' => esc_html__( 'Features', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'feature_title',
                    'selector' => '{{WRAPPER}} .upte_plan_details h4',
                ]
            );
            $this->add_control(
                'feature_title_color',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .upte_plan_details h4' => 'color: {{VALUE}}'
                    ],
                ]
            );
            $this->add_responsive_control(
                'feature_title_gap',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Gap', 'unlimited-pricing-table-for-elementor' ),
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .upte_plan_details h4' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'feature_list',
                    'selector' => '{{WRAPPER}} .upte_plan_details ul li',
                ]
            );
            $this->add_control(
                'feature_list_color',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .upte_plan_details ul li' => 'color: {{VALUE}}'
                    ],
                ]
            );
            $this->add_responsive_control(
                'feature_list_gap',
                [
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'label' => esc_html__( 'Gap', 'unlimited-pricing-table-for-elementor' ),
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .upte_plan_details ul' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();
        //End control for Typography tab

        $this->start_controls_section(
			'price_style',
			[
				'label' => esc_html__( 'Price', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'amount_font',
                    'selector' => '{{WRAPPER}} .upte_price',
                ]
            );
            $this->add_control(
                'amount_font_color',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .upte_price' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'period_pricing',
                [
                    'label' => esc_html__( 'Period', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'period_font',
                    'selector' => '{{WRAPPER}} .upte_price small',
                ]
            );
            $this->add_control(
                'period_font_color',
                [
                    'label' => esc_html__( 'Color', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .upte_price small' => 'color: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();
        //End control for Typography tab

        $this->start_controls_section(
			'button_style',
			[
				'label' => esc_html__( 'Button', 'unlimited-pricing-table-for-elementor' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->start_controls_tabs(
                'style_tabs'
            );
            
            $this->start_controls_tab(
                'style_normal_tab',
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
                            '{{WRAPPER}} .upte_btn' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'btn_bg',
                    [
                        'label' => esc_html__( 'Background', 'unlimited-pricing-table-for-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .upte_btn' => 'background: {{VALUE}}',
                        ],
                    ]
                );
            $this->end_controls_tab();

            $this->start_controls_tab(
                'style_hover_tab',
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
                            '{{WRAPPER}} .upte_btn:hover' => 'color: {{VALUE}}',
                        ],
                    ]
                );
                $this->add_control(
                    'btn_bg_hover',
                    [
                        'label' => esc_html__( 'Background', 'unlimited-pricing-table-for-elementor' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .upte_btn:hover' => 'background: {{VALUE}}',
                        ],
                    ]
                );
            $this->end_controls_tab();
            
            $this->end_controls_tabs();

            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'button',
                    'selector' => '{{WRAPPER}} .upte_btn',
                ]
            );
            $this->add_responsive_control(
                'btn_style',
                [
                    'label' => esc_html__( 'Padding', 'unlimited-pricing-table-for-elementor' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .upte_layout_three .upte_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		if ( ! empty( $settings['btn_link']['url'] ) ) {
			$this->add_link_attributes( 'btn_link', $settings['btn_link'] );
		}
        if( !empty( $settings['ribon_img'] ) ){
            echo '<style>
            .upte_layout_three.is_icon:before{
                background-image: url('. esc_url( $settings['ribon_img']['url'] ) .');
            }
            </style>';
        }
        ?>
            <div class="upte_layout_three pricing_table is_icon">
                <?php 
                    if( !empty($settings['pack_title']) ){
                        echo '<h4 class="price_pack_name">'. esc_html( $settings['pack_title'] ) .'</h4>';
                    }
                ?>
               
               <?php if( !empty( $settings['pack_thumbnail'] ) ): ?>
                <div class="pack_thumb">
                    <?php 
                        if($settings['pack_thumbnail']['id']):
                        echo wp_get_attachment_image( $settings['pack_thumbnail']['id'], 'full' );
                        else:
                            echo '<img src="'. esc_url( $settings['pack_thumbnail']['url'] ) .'" alt="Pricing table Placeholder"/>';
                        endif;
                    ?>
                </div>
                <?php endif; ?>

                <div class="upte_plan_details">
                    <?php 
                        if( !empty( $settings['features_title'] )):
                             echo '<h4>'. esc_html( $settings['features_title'] ).'</h4>';
                        endif;
                    ?>
                    <ul class="price_featur_lists">
                        <?php
                            if( count( $settings['featur_lists'] ) > 0 && is_array($settings['featur_lists']) ):
                                foreach( $settings['featur_lists'] as $list ):
                                    echo '<li class="elementor-repeater-item-'. esc_attr( $list['_id'] ) . '">';
                                    \Elementor\Icons_Manager::render_icon( $list['flist_icon'], [ 'aria-hidden' => 'true' ] );
                                    echo esc_html( $list['flist_title'] );
                                    echo '</li>';
                                endforeach;
                            endif;    
                        ?>
                    </ul>
                </div>
                
                <?php 
                    $currency   = ( $settings['currency'] != '' ) ? esc_html($settings['currency']) : false;
                    $period     = ( $settings['period'] != '' ) ? '<small>'.esc_html($settings['period']).'</small>' : false;
                    $price      = ( $settings['prim_price'] != '' ) ? esc_html($settings['prim_price']) : false;
                    
                    echo '<div class="upte_price_wr">';
                    printf('<h3 class="upte_price">%1$s%2$s%3$s</h3>', wp_kses( $currency, $allowd_tags ), wp_kses( $price, $allowd_tags ), wp_kses( $period, $allowd_tags ));
                    echo '</div>';
                ?>

                <?php 
                    if( !empty( $settings['btn_link'] ) ):
                        echo '<a '. wp_kses($this->get_render_attribute_string( "btn_link" ), true). ' class="upte_btn">'. wp_kses($settings['btn_title'], $allowd_tags) .'</a>';
                    endif;
                ?>
                
            </div>
		<?php
    }
	
}