<?php
/**
 * Locations in archives (lists) template
 *
 * @TODO
 *
 * @package   Commons_Booking
 * @author    Florian Egermann <florian@wielebenwir.de>
 * @copyright 2018 wielebenwir e.V.
 * @license   GPL 2.0+
 * @link      http://commonsbooking.wielebenwir.de
 *
 * @see       CB_Enqueue::cb_template_chooser()
 *
 * @since 2.0.0
 */
?>
<?php
$obj = new CB_Object;
$tfs = $obj->get_timeframes( array ( 'location_id' => get_the_id(), 'has_slots' => TRUE ) );
?>
<?php if ( is_array( $tfs )) { ?>
    <?php foreach ( $tfs as $tf ) { ?>
        <div class="cb-timeframe">
            <h4><?php echo $tf->description; ?> (id: <?php echo $tf->timeframe_id; ?> )</h4>
            <p><?php echo $tf->date_start; ?> - <?php echo $tf->date_end; ?></p>
            <ul class="cb-dates">
                <?php if ( is_array( $tf->calendar )) { ?>
                    <?php foreach ( $tf->calendar as $date ) { ?>
                        <li>
                            <?php echo $date['meta']['name']; ?> - <?php echo $date['meta']['date']; ?>
                            <?php if ( ! empty ( $date['slots'] ) && is_array( $date['slots'] ) ) { ?>
                                <ul class="cb-slots">
                                    <?php foreach ( $date['slots'] as $slot ) { ?>
                                        <li><?php echo $slot['description']; ?>: <?php echo $slot['time_start']; ?> - <?php echo $slot['time_end']; ?></li>
                                    <?php } // endforeach $slots ?>
                                </ul>
                            <?php } // if ( is_array( $date['slots'] ) ) { ?>
                        </li>
                    <?php } // endforeach $cal ?>
                <?php } //if ( is_array( $tf->calendar ))  ?>
            </ul>
        </div>
    <?php } // endforeach $tfs ?>
<?php } //if ( is_array( $tfs )) ?>
