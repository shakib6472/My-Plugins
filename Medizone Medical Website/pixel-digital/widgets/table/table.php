<?php
class Elementor_pixel_digital_single_page_table extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'Table';
    }

    public function get_title()
    {
        return esc_html__('Boikotha Table', 'pixel-digital');
    }

    public function get_icon()
    {
        return 'fas fa-table-cells';
    }


    protected function register_controls()
    {
        //adding Controls

        // Function to get product categories as options


        $this->end_controls_section();
    }

    public function get_categories()
    {
        return ['basic'];
    }

    public function get_keywords()
    {
        return ['slider', 'product'];
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        // Set the query args


        // Add more filters as needed for languageIds, discountRange, and ratings
?>

        <div class="container">
            <div class="row">
                <table style="width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 30%;">Name</th>
                            <th style="width: 70%;">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        <thead class="sub">
                            <tr>
                                <th colspan="2">Physical Specification <i class="fas fa-arrow-right ml-3"></i></th>

                            </tr>
                        </thead>
                        <tr>
                            <td>Display </td>
                            <td>LED+ 2.4" LCD (320*240dpi)</td>
                        </tr>
                        <thead class="sub">
                            <tr>
                                <th colspan="2">Power Supply <i class="fas fa-arrow-right ml-3"></i></th>

                            </tr>
                        </thead>
                        <tr>
                            <td>Internal battery </td>
                            <td>Rechargeable Li-ion </td>
                        </tr>
                        <tr>
                            <td>battery Backup </td>
                            <td>2 hours</td>
                        </tr>
                        <thead class="sub">
                            <tr>
                                <th colspan="2">Pulse Rate <i class="fas fa-arrow-right ml-3"></i></th>

                            </tr>
                        </thead>
                        <tr>
                            <td>Measure/alarm range </td>
                            <td>20 ~ 300bpm </td>
                        </tr>
                        <tr>
                            <td>Resolution </td>
                            <td>1bpm Accuracy: ± 3bpm</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


<?php
        // Close the render function
    }
}



?>